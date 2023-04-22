<?php

namespace App\DAO;

use App\Config;
use App\DB;

class DAO{
    protected $db;

    public function __construct(){   
        $config = new Config();
        $this->db = new DB($config->config['db']);
    }
}