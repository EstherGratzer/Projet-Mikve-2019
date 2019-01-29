<?php
session_start();
//session_destroy();
require("Controller/homeCtrl.php");
require('Model/manager.php');
require('Model/user.php');
require('Model/Category.php');

if (isset($_GET['action']))
{
    call_user_func($_GET['action']);
}
else
{
    index();
}


