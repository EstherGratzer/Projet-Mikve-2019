<?php
/**
 * Created by PhpStorm.
 * User: ESG
 * Date: 06/02/2019
 * Time: 09:50
 */

require_once('Model/manager.php');
require_once('Model/user.php');

convertPasswordToMd5();

function convertPasswordToMd5()
{
    $userClass = new User();
    $allUsers = $userClass -> getListUsers();
    foreach ($allUsers->fetchAll(PDO::FETCH_ASSOC) as $user) {
        $password = md5($user['password']);
        $userClass->db->query("UPDATE users SET password = '{$password}' WHERE id = {$user['id']}");
    }
}
