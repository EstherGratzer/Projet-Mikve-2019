<?php
/**
 * Created by PhpStorm.
 * User: leait
 * Date: 15/01/2019
 * Time: 13:41
 */

function loadClass($class)
{
    require('Model/'.$class.'.php');
}
spl_autoload_register('loadClass');

function index()
{
    $message = "";
    findCategories();
    include('View/home.php');
}

function test(){
    include('View/home.php');
}

function findCategories()
{
    $categoryClass = new Category;
    $req = $categoryClass ->find();
    $categories = $req->fetchAll(PDO::FETCH_ASSOC);
    require('View/homepageCategories.php');

}



