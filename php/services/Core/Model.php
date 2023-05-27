<?php

namespace App\Core;

class Model
{
    private Database $connect;

    public function __construct()
    {
        $this->connect = new Database();
    }
}