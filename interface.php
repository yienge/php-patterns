<?php
/*
 * Use interface to implement card reader standard
 */

interface card_reader {
    public function get_data_from_device();
}

class sim_card implements card_reader{
    public function __construct() {

    }

    public function get_data_from_device() {
        return 'get_data_from_sim_card' . "\n";
    }
}

class micro_sim_card implements card_reader{
    public function __construct() {

    }

    public function get_data_from_device() {
        return 'get_data_from_micro_sim_card' . "\n";
    }
}

class mini_sd_card implements card_reader{
    public function __construct() {

    }

    public function get_data_from_device() {
        return 'get_data_from_mini_sd_card' . "\n";
    }
}

$mini_sd_card = new mini_sd_card();
$ref = new ReflectionClass(get_class($mini_sd_card));
$if_implements = $ref->implementsInterface('card_reader');
if ($if_implements) {
    $data = $mini_sd_card->get_data_from_device($mini_sd_card);
}
echo $data;
?>
