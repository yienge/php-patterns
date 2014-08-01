<?php
/**
 * computer parts factory
 */
class computer_parts_factory
{
    public function __construct()
    {

    }

    public function get_cpu()
    {
        return 'intel cpu 1GBHz';
    }

    public function get_memory()
    {
        return 'kingston 2GB';
    }

    public function get_storage()
    {
        return 'Hitachi 1TB';
    }
}

class computer_parts_factory2
{
    public function __construct()
    {

    }

    public function get_cpu()
    {
        return 'AMD cpu 2GBHz';
    }

    public function get_memory()
    {
        return 'kingston 4GB';
    }

    public function get_storage()
    {
        return 'Hitachi 2TB';
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
     * build the computer
     */
    public function build_computer($parts_factory)
    {
        $this->cpu     = $parts_factory->get_cpu();
        $this->memory  = $parts_factory->get_memory();
        $this->storage = $parts_factory->get_storage();
    }

    /**
     * print parts
     */
    public function print_parts()
    {
        var_dump($this->cpu);
        var_dump($this->memory);
        var_dump($this->storage);
    }

}

$computer = new computer();
$parts_factory = new computer_parts_factory();
$computer->build_computer($parts_factory);
$computer->print_parts();

$computer2 = new computer();
$parts_factory2 = new computer_parts_factory2();
$computer2->build_computer($parts_factory2);
$computer2->print_parts();
