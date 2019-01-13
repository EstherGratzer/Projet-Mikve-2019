<?php
require_once("Manager.php");
class UserManager extends Manager
{
    public function add($firstname, $lastname, $login, $password, $profil_pic, $rights_id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare("INSERT INTO users (firstname, lastname, login, password, profil_pic, rights_id)
                            VALUES (?, ?, ?, ?, ?, ?)");
        $req->execute(array($firstname, $lastname, $login, $password, $profil_pic, $rights_id));
        return $req;
    }
}