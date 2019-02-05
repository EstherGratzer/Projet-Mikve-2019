<?php
/**
 * Created by PhpStorm.
 * User: ESG
 * Date: 28/01/2019
 * Time: 15:52
 */

class equipement extends manager
{
    public $type = 'equipements';

    public function getListEquipements()
    {
        $reqListEquipements = $this->db->query("SELECT * FROM equipements");
        return $reqListEquipements;
    }

    public function getOneEquipement($id)
    {
        $reqOneEquipement = $this->db->query("SELECT * FROM equipements WHERE id = {$id}");
        $infoEquipement = $reqOneEquipement->fetch(PDO::FETCH_ASSOC);
        return $infoEquipement;
    }

    public function saveEquipement($name)
    {
        $reqAddEquipement = $this->db->query("INSERT INTO equipements (name) VALUES ('{$name}')");
        return $reqAddEquipement;
    }

    public function deleteEquipement($idEquip)
    {
        $reqDeleteEquipement = $this->db->query("DELETE FROM equipements WHERE id = {$idEquip}");
        return $reqDeleteEquipement;
    }

    public function updateEquipement($id, $name)
    {
        $reqUpdateEquipement = $this->db->query("UPDATE equipements SET name= '{$name}' WHERE id = {$id}");
        return $reqUpdateEquipement;
    }
}