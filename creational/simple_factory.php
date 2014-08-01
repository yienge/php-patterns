<?php
/**
 * computer factory object
 */
class computer_factory {

    /**
     * factory building method
     */
    public function get_computer()
    {
        $cpu_speed        = '1GB';
        $memory_capacity  = '1GB';
        $storage_capacity = '1GB';
        $computer = new computer($cpu_speed, $memory_capacity, $storage_capacity);
        $computer->boot_computer('do_something');
        return $computer;
    }
}

/**
 * computer object
 */
class computer
{
    /**
     * cpu
     *
     * @var string
     **/
    private $cpu;

    /**
     * memory
     *
     * @var string
     **/
    private $memory;

    /**
     * storage
     *
     * @var string
     **/
    private $storage;

    /**
     * contructor
     */
    public function __construct($cpu, $memory, $storage)
    {
        $this->cpu     = $cpu;
        $this->memory  = $memory;
        $this->storage = $storage;
    }

    /**
     * boot the computer
     */
    public function boot_computer($task)
    {
        var_dump('computer booting start.');
        var_dump($task);
    }
}

$computer_factory = new computer_factory();
$computer1 = $computer_factory->get_computer();
$computer2 = $computer_factory->get_computer();
