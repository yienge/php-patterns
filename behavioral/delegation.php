<?php

interface employee_work_list {
    function add_goods();
    function sell_goods();
}

class full_time_employer implements employee_work_list {

    public function add_goods() {
        var_dump(__CLASS__ . ' ' . __FUNCTION__);
    }

    public function sell_goods() {
        var_dump(__CLASS__ . ' ' . __FUNCTION__);
    }
}

class part_time_employer implements employee_work_list {

    public function add_goods() {
        var_dump(__CLASS__ . ' ' . __FUNCTION__);
    }

    public function sell_goods() {
        var_dump(__CLASS__ . ' ' . __FUNCTION__);
    }
}

class boss implements employee_work_list {
    private $worker = NULL;

    public function __construct()
    {
        $this->worker = new full_time_employer();
    }

    public function add_goods()
    {
        var_dump('boss does not do work himself.');
        $this->worker->add_goods();
    }

    public function sell_goods()
    {
        var_dump('boss does not do work himself.');
        $this->worker->sell_goods();
    }

    public function change_delegate($worker)
    {
        $this->worker = $worker;
    }
}

$boss = new boss();
$boss->add_goods();
$boss->sell_goods();
$boss->change_delegate(new part_time_employer());
$boss->add_goods();
$boss->sell_goods();

/* End of file delegate.php */
