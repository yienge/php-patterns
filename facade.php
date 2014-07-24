<?php
interface base_component {
    public function get_info();
}

class cpu implements base_component{
    public function __construct() {

    }

    public function get_info() {
        return 'get_cpu_info' . "\n";
    }
}

class memory implements base_component{
    public function __construct() {

    }

    public function get_info() {
        return 'get_memory_info' . "\n";
    }
}

class storage implements base_component{
    public function __construct() {

    }

    public function get_info() {
        return 'get_storage_info' . "\n";
    }
}

class computer {
    public function __construct() {

    }

    public function gather_infos() {
        $info = array();

        $cpu = new cpu();
        $info['cpu'] = $cpu->get_info();
        $memory = new memory();
        $info['memory'] = $memory->get_info();
        $storage = new storage();
        $info['storage'] = $storage->get_info();

        return $info;
    }
}

$computer = new computer();
$res = $computer->gather_infos();
var_dump($res);
?>
