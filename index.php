<?php
session_start();
require("Controller/homeCtrl.php");
require('Model/manager.php');
require('Model/user.php');

$user = new Users();
print_r($user->get(1));

if (isset($_GET['action']))
{
    call_user_func($_GET['action']);
}
else
{
    index();
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Accueil</title>
    </head>
    <body>
        <a href="mikve.php?action=showMikve&amp;mikves_id=3"></a>
    </body>
</html>
