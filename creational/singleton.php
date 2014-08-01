<?php
class DB{
    private static $_instance = null;
    private static $_instanceCount = 0;
    private static $some_value = 0;

    // make constructor private so it can not be called from outside
    private function __construct() {
        self::$_instanceCount ++;
    }

    public static function getInstance() {
        if (null === self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function getInstanceCount() {
        return self::$_instanceCount;
    }

    public function setValue($val) {
        self::$some_value = $val;
    }

    public function getValue() {
        return self::$some_value;
    }
}

$db1 = DB::getInstance();
echo $db1->getInstanceCount(), "\n";
$db1->setValue(10);

$db2 = DB::getInstance();
echo $db2->getInstanceCount(), "\n";
echo $db2->getValue(), "\n";
?>
