<?php
session_start();
require("Controller/homeCtrl.php");
require ('Model/Manager.php');
require ('Model/Users.php');

if (isset($_GET['action']))
{
    call_user_func($_GET['action']);
}
else
{
    index();
}
?>

