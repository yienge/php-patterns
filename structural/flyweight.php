<?php
/**
 * Config
 */
class config
{
    private $area      = '';
    private $country   = '';
    private $language  = '';
    private $db_prefix = '';

    /**
     * constructor
     */
    public function __construct($area, $country, $language, $db_prefix)
    {
        $this->area      = $area;
        $this->country   = $country;
        $this->language  = $language;
        $this->db_prefix = $db_prefix;
    }

    /**
     * get hash of config
     */
    public function get_hash()
    {
        return md5($this->area . $this->country . $this->language . $this->db_prefix);
    }
}

/**
 * Config Factory
 */
class config_factory
{
    private $flyweight = array();

    /**
     * create config
     */
    public function create($area, $country, $language, $db_prefix)
    {
        $config = new config($area, $country, $language, $db_prefix);
        $md5_hash = $config->get_hash();
        if (!$this->flyweight[$md5_hash]) {
            $this->flyweight[$md5_hash] = $config;
        }
        return $this->flyweight[$md5_hash];
    }
}

$CF = new config_factory();
$config1 = $CF->create('america', 'oregon', 'en', 'am-');
$config2 = $CF->create('america', 'oregon', 'en', 'am-');

if ($config1 === $config2) {
    var_dump('config1 and config2 are the same.');
}

/* End of file flyweight.php */
