<?php
/**
 * Created by PhpStorm.
 * User: leait
 * Date: 16/01/2019
 * Time: 10:04
 */

class City extends Manager
{
    public function find()
    {
        $req = $this->db->query("SELECT cities.city, countries.code FROM cities LEFT JOIN countries on countries.id = cities.countries_id" );
        return  $req->fetchAll(PDO::FETCH_ASSOC);
    }
}



