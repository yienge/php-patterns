<?php
/**
 * computer factory object
 */
class computer_factory {

    private $prototype = NULL;

    /**
     * factory building method
     */
    public function get_computer()
    {
        if ($this->prototype) {
            return clone $this->prototype;
        } else {
            $cpu_speed        = '1GB';
            $memory_capacity  = '1GB';
            $storage_capacity = '1GB';
            $this->prototype = new computer($cpu_speed, $memory_capacity, $storage_capacity);
            return $this->prototype;
        }
    }
}

/**
 * computer
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
        var_dump('object constructed.');
    }

    /**
     * boot the computer
     */
    public function boot_computer($task)
    {
        var_dump('computer booting start.');
        var_dump($task);
    }

    public function __clone()
    {
        var_dump('object cloned.');
    }
}

$computer_factory = new computer_factory();

$computer  = $computer_factory->get_computer();
$computer2 = $computer_factory->get_computer();

if ($computer === $computer2) {
    var_dump('the same computer.');
} else {
    var_dump('not the same computer.');
}
