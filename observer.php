<?php
interface I_subject {
    public function register_observer($observer);
    public function remove_observer($observer);
    public function update_observer($msg);
}

interface I_observer {
    public function update($msg);
}

class subject implements I_subject {
    protected $observers = array();

    public function register_observer($observer) {
        $this->observers[] = $observer;
    }

    public function remove_observer($observer) {
        foreach($this->observers as $index => $observer_obj) {
            if ($observer === $observer_obj) {
                unset($this->observers[$index]);
            }
        }
    }

    public function update_observer($msg) {
        foreach($this->observers as $observer) {
            $observer->update($msg);
        }
    }
}

class observer_1 implements I_observer {
    public function update($msg) {
        echo 'I got the msg: ' . $msg . ', and I will do something.' . "\n";
    }
}

class observer_2 implements I_observer {
    public function update($msg) {
        echo 'I got the msg: ' . $msg . ', and I will do something.' . "\n";
    }

    public function do_nothing() {
        echo 'just do nothing.';
    }
}

$subject = new subject();
$observer1 = new observer_1();
$subject->register_observer($observer1);
$subject->update_observer('we are under attack.');
$subject->remove_observer($observer1);
$subject->update_observer('we are under attack.');
?>
