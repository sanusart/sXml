<?php

/**
 * Class sXml
 */
class sXml {

    private $br = "\r\n";
    private $tab = "\t";
    protected  $safe;

    /**
     * @param bool $safe
     */
    function __construct($safe=false) {
        $this->safe = $safe;
        header('Content-type: application/xml');
    }

    /**
     * @param string $version
     * @param string $encoding
     */
    public function doctype($version='1.0',$encoding='utf-8') {
        echo '<?xml version="' . $version . '" encoding="' . $encoding . '"?>' . $this->br;
    }

    /**
     * @param string $tag
     * @param array $attr
     */
    public function open($tag,$attr=array()) {
        if(is_array($attr)) {
            $param = '';
            foreach($attr as $key => $val) {
                $param .= ' ' . $key . '=' . '"' . $val . '"';
            }
        } else {
            $param = '';
        }
		echo '<' . $tag . $param . '>' . $this->br;
	}

    /**
     * @param string $tag
     */
    public function close($tag) {
		echo '</' . $tag . '>' . $this->br;
	}

    /**
     * @param string $tag
     * @param mixed $value | null
     * @param array $attr
     */
    public function node($tag,$value,$attr=array()) {
        if(is_array($attr)) {
            $param = '';
            foreach($attr as $key => $val) {
                $param .= ' ' . $key . '=' . '"' . $val . '"';
            }
        } else {
            $param = '';
        }
        if(is_null($value)) {
            echo $this->tab . '<' . $tag . $param . ' />' . $this->br;
        } else {
            echo $this->tab . '<' . $tag . $param . '>' . self::_safe($value) . '</' . $tag . '>' . $this->br;
        }
    }

    /**
     * @param string $string
     * @return string
     */
    private function _safe($string) {
        if($this->safe) {
            return '<![CDATA[' . trim($string) . ']]>';
        } else {
            return trim($string);
        }

    }
}
