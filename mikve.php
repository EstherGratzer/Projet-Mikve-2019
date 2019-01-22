<?php
session_start();
require("Controller/mikveCtrl.php");

if (isset($_GET['action']))
{
    call_user_func($_GET['action']);
}
else
{
    index();
}
?>
