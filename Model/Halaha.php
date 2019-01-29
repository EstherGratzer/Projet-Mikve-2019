<?php
/**
 * Created by PhpStorm.
 * User: leait
 * Date: 22/01/2019
 * Time: 09:24
 */

class Halaha extends Manager
{
    public function get()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->query("SELECT * FROM halahotes" );
        return $req;
    }
}

