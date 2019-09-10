<?php 

namespace Yukky;

class LogFull extends Log {
    public $type;

    public function __construct($name, $tags = [], $desc = '', $infos = null, $type) {
        parent::__construct($name, $tags, $desc, $infos);
        $this->type = $type;
    }
}


?>