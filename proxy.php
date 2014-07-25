<?php
/*
 * Bridge pattern : use interface to implement card reader standard,
 * and give two ways to check if a class implements specific interface.
 */
class image {
    private $filename = '';

    public function __construct($filename) {
        $this->filename = $filename;
    }

    public function draw() {
        echo 'draw_pic_on_screen: ' . $this->filename . "\n";
    }
}

class image_draw_count_proxy {

    private $image    = null;
    private $filename = null;
    private $count    = 0;

    public function __construct($filename) {
        $this->filename = $filename;
        $this->count = 0;
    }

    public function draw() {
        if (!$this->image) {
            $this->image = new image($this->filename);
        }
        $this->image->draw();
        $this->count++;
        echo $this->filename . ' has been drawed ' . $this->count . ' times.' . "\n";
    }

    public function __destruct() {
        echo 'image: ' . $this->filename . ' destructed. write the count back to DB.' . "\n";
    }
}

class App {
    private $images = array();

    public function __construct($image_paths = array()) {
        foreach($image_paths as $image_path) {
            $this->images[] = new image_draw_count_proxy($image_path);
        }
    }

    public function display() {
        foreach($this->images as $image) {
            $image->draw();
        }
        $this->images[0]->draw();
    }
}

$image_arr = array(
    '/var/www/image/12345',
    '/var/www/image/23456',
);
$app = new App($image_arr);
$app->display();
?>
