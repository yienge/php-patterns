<?php
interface Imediator
{
    function state_change($obj, $action);
    function register($obj);
    function notify($obj, $obj_action, $component);
}

interface IComponent
{
    function status_change($actino);
    function adjust($action);
}

class basic_mediator implements Imediator
{
    private $list_box = array();
    private $selector = array();
    private $menu     = array();

    private $class_list = array(
        'list_box',
        'selector',
        'menu'
    );

    /**
     * mediator receives component status change event
     */
    public function state_change($obj, $action)
    {
        foreach($this->class_list as $component_type) {
            if (get_class($obj) != $component_type) {
                foreach ($this->$component_type as $component) {
                    $this->notify($obj, $action, $component);
                }
            }
        }
    }

    /**
     * decide which component to notify
     */
    public function notify($obj, $obj_action, $component)
    {
        $component_action = $this->get_responding_action($obj, $obj_action, $component);
        $component->adjust($component_action);
    }

    /**
     * component register
     */
    public function register($obj)
    {
        foreach($this->class_list as $class) {
            if (get_class($obj) == $class) {
                array_push($this->$class, $obj);
            }
        }
    }

    /**
     * decide what action the component will take
     */
    protected function get_responding_action($obj, $obj_action, $component)
    {
        $component_action = '[action_from_' . get_class($obj) . '_on_' . $obj_action . '_to_' . get_class($component). ']';
        return $component_action;
    }
}

class list_box implements IComponent
{
    private $mediator = NULL;

    public function __construct($mediator)
    {
        $this->mediator = $mediator;
        $this->mediator->register($this);
    }

    public function status_change($action)
    {
        $this->mediator->state_change($this, $action);
    }

    public function adjust($action)
    {
        var_dump(__CLASS__ . ' receives ' . $action);
    }
}

class selector implements IComponent
{
    private $mediator = NULL;

    public function __construct($mediator)
    {
        $this->mediator = $mediator;
        $this->mediator->register($this);
    }

    public function status_change($action)
    {
        $this->mediator->state_change($this, $action);
    }

    public function adjust($action)
    {
        var_dump(__CLASS__ . ' receives ' . $action);
    }
}

class menu implements IComponent
{
    private $mediator = NULL;

    public function __construct($mediator)
    {
        $this->mediator = $mediator;
        $this->mediator->register($this);
    }

    public function status_change($action)
    {
        $this->mediator->state_change($this, $action);
    }

    public function adjust($action)
    {
        var_dump(__CLASS__ . ' receives ' . $action);
    }
}

$mediator = new basic_mediator();
$list_box1 = new list_box($mediator);
$menu1     = new menu($mediator);
$selector1 = new selector($mediator);
$list_box1->status_change('one_box_checked');
$menu1->status_change('menu_selected');
$selector1->status_change('option_selected');

/* End of file mediator.php */
