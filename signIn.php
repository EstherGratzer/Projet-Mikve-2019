<?php
/**
 * Created by PhpStorm.
 * User: ESG
 * Date: 17/01/2019
 * Time: 16:00
 */
session_start();
require('controller/signInCtrl.php');

$signinCtrl = new signInCtrl();

if (isset($_GET["action"])) {
    call_user_func(array($signinCtrl,$_GET["action"]));
}
else {
    $signinCtrl->index();
}
