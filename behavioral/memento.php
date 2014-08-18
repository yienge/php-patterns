<?php
date_default_timezone_set('Asia/Taipei');

class document {

    private $content = '';

    public function backup($tag_name) {
        $backup = new backup($this->content, $tag_name);
        return $backup;
    }

    public function recovery($backup) {
        $this->content = $backup->content;
        var_dump('content recover to : ' . $this->content);
    }

    public function add_content($sentences) {
        $this->content .= $sentences;
    }
}

class backup {
    public $content  = NULL;
    public $datetime = NULL;
    public $tag      = NULL;

    public function __construct($content, $tag) {
        $this->content  = $content;
        $this->datetime = date('Y-m-d H:i:s');
        $this->tag      = $tag;
    }
}

class document_manager {
    private $backup_list = array();

    public function set_backup($backup) {
        $this->backup_list[] = $backup;
    }

    public function get_backup($tag) {
        foreach ($this->backup_list as $backup) {
            if ($backup->tag == $tag) {
                return $backup;
            }
        }
    }

    public function list_backup()
    {
        foreach ($this->backup_list as $backup) {
            var_dump($backup);
        }
    }
}

$doc = new document();
$manager = new document_manager();

$doc->add_content('hihi');
$backup = $doc->backup('first_backup');
$manager->set_backup($backup);

$doc->add_content(' yoyo');
$backup = $doc->backup('second_backup');
$manager->set_backup($backup);

$manager->list_backup();

$backup = $manager->get_backup('first_backup');
$doc->recovery($backup);
/* End of file memento.php */
