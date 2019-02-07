<?php
/**
 * Created by PhpStorm.
 * User: ESG
 * Date: 07/02/2019
 * Time: 11:18
 */

class Ratings extends Manager
{
    public function insert($rate, $mikveId, $userId)
    {
        $reqInsertRate = $this->db->query("INSERT INTO ratings(rate, mikves_id, users_id) VALUES({$rate}, {$mikveId}, {$userId})");
        return $reqInsertRate;
    }

    public function average($mikves_id) {
        $req = $this->db-> query("SELECT AVG(rate) as nb_stars FROM ratings WHERE mikves_id={$mikves_id}");
        return $req;
    }
}