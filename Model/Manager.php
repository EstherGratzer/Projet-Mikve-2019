<?php
require '../config/config.anaelle.php';
class Manager{
    protected function dbConnect()
    {
        $bdd = new PDO('mysql:host={HOST};dbname=projetmikve;charset=utf8', '{BDUSER}', '{BDPASSWORD}');
        return $bdd;
    }
}

