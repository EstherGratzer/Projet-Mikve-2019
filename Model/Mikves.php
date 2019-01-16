<?php
require_once("Model/Manager.php");
class Mikves extends Manager
{
    public function createMikve($name, $address, $phoneNumber, $openningTimes, $prices_id, $equipements_id, $images_id) // $users_id ???
    {
        $db = $this->dbConnect();
        $req = $db->prepare("INSERT INTO mikves (name, address, phoneNumber, openningTimes, prices_id, equipements_id, images_id)
                            VALUES (?, ?, ?, ?, ?, ?, ?)");
        $req->execute(array($name, $address, $phoneNumber, $openningTimes, $prices_id, $equipements_id, $images_id));
        return $req;
    }
    public function updateMikve($mikves_id, $name, $address, $phoneNumber, $openningTimes, $prices_id, $equipements_id, $images_id) // OK
    {
        $db = $this->dbConnect();
        $req = $db->prepare("UPDATE mikves
                            SET name=?, address=?, phoneNumber=?, openningTimes=?, prices_id=?, equipements_id=?, images_id=?
                            WHERE id = ?");
        $req->execute(array($name, $address, $phoneNumber, $openningTimes, $prices_id, $equipements_id, $images_id, $mikves_id));
        return $req;
    }
    public function deleteMikve($mikves_id) // OK
    {
        $db = $this->dbConnect();
        $req = $db->prepare("DELETE FROM mikves
                            WHERE id = ?");
        $req->execute(array($mikves_id));
        return $req;
    }
    public function getListMikves($start) //
    {
        $db = $this->dbConnect();
        $req = $db->query("SELECT mikves.id AS mikves_id,
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
    public function getOneMikve($mikves_id, $start) //
    {
        $db = $this->dbConnect();
        $req = $db->prepare("SELECT mikves.id AS mikves_id,
                                              mikves.name,
                                              mikves.address,
                                              mikves.phoneNumber,
                                              mikves.openningTimes, 
                                              mikves.prices_id,
                                              mikves.equipements_id,
                                              mikves.images_id,
                                              prices.id AS prices_id,
                                              prices.name,
                                              prices.mikves_id,
                                              prices.equipements_id,
                                              equipements.id AS equipements_id,
                                              equipements.name,
                                              equipements.mikves_id,
                                              images.id AS images_id,
                                              images.name
                                        FROM mikves
                                        INNER JOIN prices
                                        ON mikves.prices_id = prices.id
                                        INNER JOIN equipements
                                        ON mikves.equipements_id = equipements.id
                                        INNER JOIN images
                                        ON mikves.images_id = images.id
                                        WHERE subjects.id = ?") or die(print_r($db->errorInfo())); // la table images n'existe pas mais medias existe
        $req->execute(array($mikves_id));
        $post= $req->fetch();
        return $post;
    }
}