<?php
/**
 * Created by PhpStorm.
 * User: leait
 * Date: 15/01/2019
 * Time: 13:41
 */

function loadClass($class)
{
    require('modele/'.$class.'.php');
}
spl_autoload_register('loadClass');

function index()
{
    $message = "";
    include('View/home.php');
}

function test(){
    include('View/home.php');
}