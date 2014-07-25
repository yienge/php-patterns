<?php
/*
 * Proxy pattern : image_proxy can delay image loading & count image
 * reference & get image domain
 */
class web_page_controller {

    public function get_input() {}
    public function input_validation() {}
    public function get_data() {}
    public function get_js() {}
    public function get_css() {}
    public function render() {}

    public function index() {
        $this->get_input();
        $this->input_validation();
        $this->get_data();
        $this->get_js();
        $this->get_css();
        $this->render();
    }
}

class web_page_index extends web_page_controller {
    public function get_input() {
        echo 'do_get_input'."\n";
    }

    public function input_validation() {
        echo 'do_input_validation'."\n";
    }

    public function get_data() {
        echo 'do_get_data'."\n";
    }

    public function get_js() {
        echo 'do_get_js'."\n";
    }

    public function get_css() {
        echo 'do_get_css'."\n";
    }

    public function render() {
        echo 'do_render'."\n";
    }
}

$index_page = new web_page_index();
$index_page->index();
?>
