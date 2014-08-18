<?php
/**
 * strategy interface
 *
 * @package none
 * @author James.lo yienge@gmail.comm
 */
interface strategy
{
    function sort($array);
}

/**
 * class of binary search
 */
class binary_sort implements strategy
{
   public function sort($array) {
        var_dump('do ' . __CLASS__ . ' on');
        var_dump($array);
   }
}

/**
 * class of binary search
 */
class bubble_sort implements strategy
{
   public function sort($array) {
        var_dump('do ' . __CLASS__ . ' on');
        var_dump($array);
   }
}

/**
 * class of binary search
 */
class quick_sort implements strategy
{
   public function sort($array) {
        var_dump('do ' . __CLASS__ . ' on');
        var_dump($array);
   }
}

class sort_container {
    private $sort_method = NULL;

    public function __construct($sort_class)
    {
        $this->sort_method = new $sort_class();
    }

    public function do_sort($array) {
        $this->sort_method->sort($array);
    }
}

$sort = new sort_container(new quick_sort());
$sorted_array = $sort->do_sort(array(3,2,1));
$sort = new sort_container(new bubble_sort());
$sorted_array = $sort->do_sort(array(3,2,1));

/* End of file strategy.php */
