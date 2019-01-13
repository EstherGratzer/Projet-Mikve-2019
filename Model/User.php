<?php
/**
 * Created by PhpStorm.
 * User: leviathan36
 * Date: 2019-01-13
 * Time: 14:18
 */

class User extends Manager
{
    public function addUser($firstname, $lastname, $login, $password, $picture, $rights)
    {
    $bdd = $this->dbConnect();

    $req = $bdd->query("INSERT INTO users(firstname, lastname, login, password, profil_pic, rights_id) 
                            VALUES('".$firstname."', '".$lastname."', '".$login."', '".$password."', '".$picture."', '".$rights."') ");

    return $req;
    }

}