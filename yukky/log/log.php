<?php 

namespace yukky\log;

class Log {
    public $name;
    public $tags;
    public $desc;
    public $infos;

    public function __construct($name, $tags = [], $desc = '', $infos = null) {
        $this->name = $name;
        $this->tags = $tags;
        $this->desc = $desc;
        $this->infos = $infos;
    }
}

?>