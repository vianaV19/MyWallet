<?php

namespace MF;

use App\Connection;

abstract class Model
{
    protected $db;

    function __construct()
    {
        $conn = new Connection;
    
        $this->db = $conn->open();
    }
}
