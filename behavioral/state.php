<?php
interface State
{
    public function change($door);

    /* for directional state change
    public function forward();
    public function backward();
     */
}

abstract class door_status implements State
{
    abstract public function change($door);

    /* for directional state change
    abstract public function forward();
    abstract public function backward();
     */
}

class open extends door_status
{
    public function change($door)
    {
        var_dump('the door is closing');
        sleep(1);
        $door->set(new close());
    }
}

class close extends door_status
{
    public function change($door)
    {
        var_dump('the door is opening');
        sleep(1);
        $door->set(new open());
    }
}

class electric_door
{
    private $state = NULL;

    public function __construct()
    {
        $this->state = new close();
    }

    public function set($state)
    {
        $this->state = $state;
    }

    public function change()
    {
        $this->state->change($this);
    }
}

$electric_door = new electric_door();
while (1) {
    $electric_door->change();
}
/* End of file state.php */
