<?php
// IMPORTANT : A MODIFIER DANS MYSQL
// AJOUTER LA TABLE IMAGES AVEC LES CHAMPS ID ET NAME
//DANS LA TABLE EQUIPEMENTS SUPPRIMER LE CHAMPS MIKVE_ID
// DANS LA TABLE PRICES SUPPRIMER LE HAMPS MIKVE_ID
require_once("Model/manager.php");

class Mikve extends Manager
{
    public function createMikve($name, $address, $phoneNumber, $openningTimes, $prices_id, $equipements_id, $images_id) // $users_id ???
    {
        $req = $this->db->prepare("INSERT INTO mikves (name, address, phoneNumber, openningTimes, prices_id, equipements_id, images_id)
                            VALUES (?, ?, ?, ?, ?, ?, ?)");
        $req->execute(array($name, $address, $phoneNumber, $openningTimes, $prices_id, $equipements_id, $images_id));
        return $req;
    }
    public function updateMikve($mikves_id, $name, $address, $phoneNumber, $openningTimes, $prices_id, $equipements_id, $images_id) // OK
    {
        $req = $this->db->prepare("UPDATE mikves
                            SET name=?, address=?, phoneNumber=?, openningTimes=?, prices_id=?, equipements_id=?, images_id=?
                            WHERE id = ?");
        $req->execute(array($name, $address, $phoneNumber, $openningTimes, $prices_id, $equipements_id, $images_id, $mikves_id));
        return $req;
    }
    public function deleteMikve($mikves_id) // OK
    {
        $req = $this->db->prepare("DELETE FROM mikves
                            WHERE id = ?");
        $req->execute(array($mikves_id));
        return $req;
    }
    public function getListMikves($start) //
    {
        $req = $this->db->query("SELECT mikves.id AS mikves_id,
                                mikves.name,
                                mikves.address,
                                mikves.images_id,
                                images.id AS images_id
                                images.name
                            FROM mikves
                            INNER JOIN images
                            WHERE mikves.images_id = images.id
                            ORDER BY ????? DESC");//LIMIT ".$start.", 2" // la table images n'existe pas mais medias existe
        return $req;
    }
    public function getOneMikve($mikves_id, $tables_id) // OK
    {
        $mikveArray = [];


        $sqlMikve = $this->db->prepare("SELECT mikves.*
                                            FROM mikves
                                           WHERE mikves.id = ?") or die(print_r($db->errorInfo())); // la table images n'existe pas mais medias existe
        $sqlMikve->execute(array($mikves_id));
        $mikveInfos = $sqlMikve->fetch(PDO::FETCH_ASSOC);
        $sqlMikve->closeCursor();
        $mikveArray['infos'] = $mikveInfos;

        $sqlEquipements = $this->db->prepare("SELECT equipements.name
                                                  FROM equipements
                                                  JOIN mikveequipements
                                                  ON equipements.id = mikveequipements.equipements_id
                                                  WHERE mikveequipements.mikves_id = ? ") or die(print_r($db->errorInfo())); // la table images n'existe pas mais medias existe
        $sqlEquipements->execute(array($mikves_id));
        $mikveEquipements = $sqlEquipements->fetchAll(PDO::FETCH_ASSOC);
        $sqlEquipements->closeCursor();
        $mikveArray['equipements'] = $mikveEquipements;

        $sqlImages = $this->db->prepare("SELECT medias.*
                                       FROM medias
                                      WHERE medias.tables_id = ?
                                      AND medias.types_id= ?") or die(print_r($db->errorInfo())); // la table images n'existe pas mais medias existe
        $sqlImages->execute(array($tables_id, $mikves_id)); // $mikves_id = medias.types_id
        $mikveImages = $sqlImages->fetchAll(PDO::FETCH_ASSOC);
        $sqlImages->closeCursor();
        $mikveArray['images'] = $mikveImages;

        return $mikveArray;
    }
}

/*
 *
 * $db = $this->dbConnect();
        $req = $db->prepare("SELECT mikves.*,
                                              medias.*,
                                              mikveequipements.*,
                                              equipements.name
                                              FROM `mikves`
                                              JOIN medias
                                              ON medias.types_id = mikves.id
                                              JOIN mikveequipements
                                              ON mikveequipements.mikves_id = mikves.id
                                              JOIN equipements
                                              ON mikveequipements.equipements_id = mikveequipements.equipements_id
                                              WHERE medias.tables_id = 1
                                              AND mikves.id = 3") or die(print_r($db->errorInfo())); // la table images n'existe pas mais medias existe
        $req->execute(array($mikves_id, $tables_id));
        $mikves= $req->fetch();
        return $mikves;
 *
 *
 *
 *
 *
 *
 *
                                              SELECT mikves.*
                                              GROUP_CONCAT(DISTINCT equipements.name) AS equipements__name,
                                              GROUP_CONCAT(DISTINCT medias.path) AS medias__path
                                        FROM mikves
                                        INNER JOIN mikveequipements
                                        ON mikves.id = mikveequipements.mikves_id
                                        INNER JOIN equipements
                                        ON equipements.id = mikveequipements.equipements_id
                                        INNER JOIN medias
                                        ON mikves.id = medias.types_id
                                        INNER JOIN tables
                                        ON tables.id = medias.tables_id
                                        WHERE mikves.id = ?
                                        GROUP BY mikveequipements.mikves_id
 */