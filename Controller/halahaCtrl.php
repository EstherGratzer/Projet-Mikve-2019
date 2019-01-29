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
    $halahaClass = new halaha;
    $options = [];
    if(isset($_GET['currentHalaha'])) {
        $options['currentHalaha'] = $_GET['currentHalaha'];
    }
    $req = $halahaClass ->find($options);
    $halahotes = $req->fetchAll(PDO::FETCH_ASSOC);
    $halahaRandomKey = array_rand($halahotes, 1);
    $halaha = $halahotes[$halahaRandomKey];
    if(isset($_GET['isAjax'])){
        require ('View/halahaContent.php');
    } else {
        require('View/halahotes.php');
    }

}


?>


