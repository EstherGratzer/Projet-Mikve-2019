<?php
session_start();
require("Controller/halahaCtrl.php");
require ('Model/Manager.php');


if (isset($_GET['action']))
{
    call_user_func($_GET['action']);
}
else
{
    index();
}

?>