<?php
session_start();
require("Controller/homeCtrl.php");
require('Model/manager.php');
require('Model/user.php');


if (isset($_GET['action']))
{
    call_user_func($_GET['action']);
}
else
{
    index();
}
?>

