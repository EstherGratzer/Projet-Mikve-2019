<?php

require_once ("Model/Manager.php");
require_once ("Model/User.php");

$firstname = "shalva";
$lastname = "adjedj";
$login = "shalva";
$password = "serenite";
$profil_pic = "";
$rights = "";


$user = new user();
$user->addUser($firstname, $lastname, $login, $password, $profil_pic, $rights);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mikve</title>
</head>
<body>

</body>
</html>
