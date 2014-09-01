<?php
/**
 * builder interface
 *
 * @package default
 * @author yienge <yienge@gmail.com>
 */
interface doc_converter
{
    public function get_doc_header();
    public function convert_tag($tag);
}

class doc_creator {

    private $raw_string = NULL;
    private $converter = NULL;

    public function __construct($file_type, $input_string, $file_name)
    {
        $converter_name = $file_type . '_doc_converter';
        $this->converter = new $converter_name();
        $this->raw_string = $input_string;
        $this->convert($file_name);
    }

    public function convert($file_name)
    {
        $original_content = $this->raw_string;
        $processed_content = $this->process($original_content);
        $this->save($processed_content, $file_name);
    }

    public function process($original_content) {
        $pattern = '/(<[\/A-Za-z0-9]*>)/i';
        $processed_content = preg_replace($pattern, $this->converter->convert_tag('${1}'), $original_content);
        $final_content = $this->converter->get_doc_header() . $processed_content;
        return $final_content;
    }

    public function save($doc_content, $file_name)
    {
        var_dump($file_name . '.' . get_class($this->converter) . ' is saved. With content: ' . $doc_content);
    }
}

class pdf_doc_converter implements doc_converter {
    public function get_doc_header()
    {
        return ' ==pdf_file_header== ';
    }

    public function convert_tag($tag)
    {
        return ' [' . $tag . '_in_pdf]';
    }
}

class txt_doc_converter implements doc_converter {
    public function get_doc_header()
    {
        return ' ==txt_file_header== ';
    }

    public function convert_tag($tag)
    {
        return ' [' . $tag . '_in_txt]';
    }
}

$content = 'it is a <b>good</b> day.';
$doc_creator = new doc_creator('pdf', $content, 'test_la');

$content = 'it is a <b>good</b> day.';
$doc_creator = new doc_creator('txt', $content, 'test_la');
/* End of file builder.php */
