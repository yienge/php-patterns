<?php
/*
 * Use adapter pattern to implement a 3 in 1 card reader
 */
class three_in_one_card_reader {
    private $method_mapping = array(
        'sim_card'       => 'get_from_sim_card',
        'micro_sim_card' => 'get_from_micro_sim_card',
        'mini_sd_card'   => 'get_from_mini_sd_card',
    );

    public function __construct() {

    }

    public function get_data_from_device($instance) {
        $method = $this->method_mapping[get_class($instance)];
        $data = $instance->$method();
        return $data;
    }
}

class sim_card {
    public function __construct() {

    }

    public function get_from_sim_card() {
        return 'get_data_from_sim_card' . "\n";
    }
}

class micro_sim_card {
    public function __construct() {

    }

    public function get_from_micro_sim_card() {
        return 'get_data_from_micro_sim_card' . "\n";
    }
}

class mini_sd_card {
    public function __construct() {

    }

    public function get_from_mini_sd_card() {
        return 'get_data_from_mini_sd_card' . "\n";
    }
}

$adapter = new three_in_one_card_reader();
$mini_sd_card = new mini_sd_card();
$data = $adapter->get_data_from_device($mini_sd_card);
echo $data;
?>
