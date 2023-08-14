<?php

namespace Config;

use Dotenv\Dotenv;

class Dotenv
{
    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(ROOTPATH);
        $dotenv->load();
    }
}
