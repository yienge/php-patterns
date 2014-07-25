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

    private $area_code = '';
    private $image_domain = '';
    private $image    = null;
    private $filename = null;
    private $count    = 0;

    public function __construct($filename) {
        $this->area_code = $this->get_area_code();
        $this->image_domain = $this->get_image_domain();
        $this->filename = $filename;
        $this->count = 0;
    }

    private function get_area_code() {
        return 'us-east';
    }

    private function get_image_domain() {
        switch ($this->area_code) {
            case 'us-east':
                return 'img.example.com/us-east';
                break;
            case 'us-west':
                return 'img.example.com/us-east';
                break;
            default:
                return 'img.example.com/tw';
                break;
        }
    }

    public function draw() {
        if (!$this->image) {
            $this->image = new image($this->image_domain . $this->filename);
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
    '/shop/banner/30x30/12345.jpg',
    '/shop/banner/30x30/23456.jpg',
);
$app = new App($image_arr);
$app->display();
?>
