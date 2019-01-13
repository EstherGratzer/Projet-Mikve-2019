<?php
//require ('../config/config.anaelle.php');
class Manager{
    protected function dbConnect()
    {
        $bdd = new PDO('mysql:host=localhost;dbname=projetmikve;charset=utf8', 'anaelle', 'anaelle19');
        return $bdd;
    }
}

