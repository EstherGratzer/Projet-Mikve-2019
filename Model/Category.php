<?php
/**
 * Created by PhpStorm.
 * User: leait
 * Date: 16/01/2019
 * Time: 10:04
 */

class Category extends Manager
{
    public function find()
    {
        $req = $this->db->query("SELECT * FROM categories" );
        return $req;
    }
}



