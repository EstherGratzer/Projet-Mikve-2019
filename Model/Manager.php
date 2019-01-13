<?php

//require '../config/config.shalva.php';

class Manager
{

    protected function dbConnect()
    {
        $bdd = new PDO('mysql:host=localhost;dbname=projetmikve;charset=utf8', 'root', '');
        return $bdd;
    }
}

