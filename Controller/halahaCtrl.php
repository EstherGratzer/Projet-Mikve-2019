<?php
function loadClass($class)
{
require('Model/'.$class.'.php');
}
spl_autoload_register('loadClass');

function index()
{
   $message = "";
   getHalaha();
   // include('View/halahotes.php');
}

function getHalaha()
{
    $halahaClass = new Halaha;
    $req = $halahaClass ->get();
    $halahotes = $req->fetchAll(PDO::FETCH_ASSOC);
    $halahaRandomKey = array_rand($halahotes, 1);
    $halaha = $halahotes[$halahaRandomKey];
    require('View/halahotes.php');

}



?>


