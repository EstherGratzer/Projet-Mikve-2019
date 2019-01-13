<?php
require ('Model/Manager.php');
require ('Model/Users.php');
$firstname = "Esther";
$lastname = "Gratzer";
$login = "esthergratzer@gmail.com";
$password = "123456789";

$user = new Users();
$user -> createUser($firstname, $lastname, $login, $password);

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
