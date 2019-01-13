<?php
require_once('Model/Manager.php');
require_once ("Model/UserManager.php");
$firstname = "a";
$lastname= "b";
$login="c";
$password="d";
$profil_pic="e";
$rights_id=1;
$newuser = new UserManager();
$newuser->add($firstname, $lastname, $login, $password, $profil_pic, $rights_id);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


</body>
</html>
