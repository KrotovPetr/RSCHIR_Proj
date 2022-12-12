<?php

namespace application\core;

use application\lib\Db;
use mysqli;

abstract class Model {

    public $db;

    public function __construct() {
        $this->db = new Db;
    }

}