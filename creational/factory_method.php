<?php
/**
 * abstract windows_controller
 */
abstract class windows_controller
{
    private $windows_list = array();
    private $current_window = NULL;

    public function open($application)
    {
        $window = $this->create_window();
        $window->set_title($application);
        $window->draw($layout);
        $windows_list[] = $window;
        $this->current_window = $window;
    }

    public function get_currrent_window($index)
    {
        $this->current_window = $this->windows_list[$index];
    }

    public function maximize()
    {
        $this->current_window->maximize();
    }

    public function minimize()
    {
        $this->current_window->minimize();
    }

    public function move()
    {
        $this->current_window->move();
    }

    public function close()
    {
        $this->current_window->close();
    }

    abstract public function create_window();
}

/**
 * abstract window
 */
abstract class window
{
    private $title = '';
    private $canvas = array();

    public function set_title($app)
    {
        $this->title = $app;
        var_dump('title has been set.');
    }

    public function draw($layout)
    {
        $this->canvas = $layout;
        var_dump('canvas has been drawn.');
    }

    abstract public function close();
    abstract public function move();
    abstract public function maximize();
    abstract public function minimize();
}

/**
 * concrete windows_controller
 */
class concrete_windows_controller extends windows_controller
{
    public function create_window()
    {
        return new concrete_popping_window();
    }
}

/**
 * concrete window
 */
class concrete_popping_window extends window
{
    public function close()
    {
        var_dump('bubble_bursting_effect');
    }

    public function move()
    {
        var_dump('bubble_floating_effect');
    }

    public function maximize()
    {
        var_dump('bubble_becomes_bigger');
    }

    public function minimize()
    {
        var_dump('bubble_becomes_smaller');
    }
}

$window_manager = new concrete_windows_controller();
$window_manager->open('evernote');
$window_manager->move();
$window_manager->close();
