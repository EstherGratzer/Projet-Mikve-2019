<?php
/**
 * Created by PhpStorm.
 * User: ESG
 * Date: 13/01/2019
 * Time: 14:57
 */

class Users extends Manager
{
    public function createUser($firstname, $lastname, $login, $password) {
        $db = $this -> dbConnect();
        $reqNewUser = $db->prepare('INSERT INTO users(firstname, lastname, login, password) VALUES(?, ?, ?, ?)');
        $newUser = $reqNewUser->execute(array($firstname, $lastname, $login, $password));
        return $newUser;
    }
}