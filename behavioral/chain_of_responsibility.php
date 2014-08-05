<?php
/**
 * abstract handler
 */
abstract class handler {

    protected $next_handler;

    public function __construct($next = NULL)
    {
        if ($next) {
            $this->next_handler = $next;
        }
    }

    public function do_next($c) {
        if ($this->next_handler) {
            $next_handler = $this->next_handler;
            $next_handler->handle($c);
        } else {
            var_dump('processing chain end.');
        }
    }

    abstract function handle($c);
}

/**
 * numeric_handler
 */
class numeric_handler extends handler
{
    public function __construct($next)
    {
        parent::__construct($next);
    }

    public function handle($c) {
        var_dump($c . ' has been processed by ' . __CLASS__);
        $this->do_next($c);
    }
}

/**
 * character_handler
 */
class character_handler extends handler
{
    public function __construct($next)
    {
        parent::__construct($next);
    }

    public function handle($c) {
        var_dump($c . ' has been processed by ' . __CLASS__);
        $this->do_next($c);
    }
}

/**
 * special_symbol_handler
 */
class special_symbol_handler extends handler
{
    public function __construct($next)
    {
        parent::__construct($next);
    }

    public function handle($c) {
        var_dump($c . ' has been processed by ' . __CLASS__);
        $this->do_next($c);
    }
}

/**
 * upper_case_handler
 */
class upper_case_handler extends handler
{
    public function __construct($next)
    {
        parent::__construct($next);
    }

    public function handle($c) {
        var_dump($c . ' has been processed by ' . __CLASS__);
        $this->do_next($c);
    }
}


$handlers_chain = new upper_case_handler(new character_handler(new numeric_handler(new special_symbol_handler(NULL))));
$handlers_chain->handle('hihi');
