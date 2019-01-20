<?php

class Manager
{
    protected function dbConnect()
    {
        $ini = parse_ini_file('config.ini');
        $db = new PDO('mysql:host='.$ini['db_host'].';dbname='.$ini['db_name'].'; charset=utf8', $ini['db_user'], $ini['db_password']);
        return $db;
    }


}

