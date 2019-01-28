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
        $req = $this->db->query("SELECT * FROM halahotes" );
        return $req;
    }
}

