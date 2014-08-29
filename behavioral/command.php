<?php
/**
 * plugin interface
 *
 * @package default
 * @author  yienge <yienge@gmail.com>
 */
interface plugin
{
    public function get_browser_config();
    public function do_something();
    public function do_other_thing();
    public function render_screen();
}

/**
 * command interface
 *
 * @package default
 * @author  yienge <yienge@gmail.com>
 */
interface command
{
    public function execute($plugin_impl);
}

/*
 * receiver
 */
class plugin_impl implements plugin
{
    public function get_browser_config()
    {
        var_dump(__FUNCTION__);
    }

    public function render_screen()
    {
        var_dump(__FUNCTION__);
    }

    public function do_something()
    {
        var_dump(__FUNCTION__);
    }

    public function do_other_thing()
    {
        var_dump(__FUNCTION__);
    }
}

/*
 * invoker
 */
class plugin_executor
{
    private $commands = [];
    private $plugin_instance = NULL;

    public function __construct()
    {
        $this->plugin_instance = new plugin_impl();
    }

    public function add_command($name, $command)
    {
        $this->commands[$name] = $command;
    }

    public function execute($name)
    {
        $this->commands[$name]->execute($this->plugin_instance);
    }
}

class instruction_a implements command{

    public function execute($plugin_impl) {
        $plugin_impl->get_browser_config();
        $plugin_impl->do_something();
        $this->do_or_die();
        $plugin_impl->render_screen();
    }

    public function do_or_die() {
        var_dump(__FUNCTION__);
    }
}

class instruction_b implements command{

    public function execute($plugin_impl) {
        $plugin_impl->get_browser_config();
        $plugin_impl->do_other_thing();
        $this->do_what_you_want();
        $plugin_impl->render_screen();
    }

    public function do_what_you_want() {
        var_dump(__FUNCTION__);
    }
}


$executor = new plugin_executor();
$executor->add_command('a', new instruction_a());
$executor->execute('a');
$executor->add_command('b', new instruction_b());
$executor->execute('b');
/* End of file command.php */
