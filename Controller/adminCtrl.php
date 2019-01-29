<?php
session_start();
// Chargement des classes
require_once('Model/manager.php');
require_once('Model/user.php');
require_once('Model/halaha.php');
function index()
{
    $showLoginForm = true;

    if (isset($_SESSION['user']) && ($_SESSION['user']['rights_id']==1))
    {
        $showLoginForm = false;
    }
    else
    {
        $showLoginForm = true;
    }
    require("View/admin.php");
}

function login()
{
    if(!empty ($_POST['Login']) && !empty ($_POST['Password']))
    {
        $user = new User();
        $getAdmin = $user->getAdmin($_POST['Login'], $_POST['Password']);

        if ($getAdmin == false)
        {
            throw new Exception('Vous n\'avez pas les droits suffisants à la connexion' );
        }
        else
        {
            $_SESSION['user'] = $getAdmin;
            $showLoginForm = false;
            require("View/homeAdmin.php");
            //header('location:index.php?action=displayAdmin');
        }
    }
    else
    {
        $message = '
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger">Veuillez saisir un login et/ou mot de passe</div>
                </div>
            </div>';
        include('view/admin.php');
    }
}



function listUsers() // OK
{
    $user = new User();
    $reqListUsers = $user->getListUsers();

    if ($reqListUsers === false) {
        throw new Exception('Impossible d\'afficher la liste des Utilisateurs !');
    } else {
        require('View/adminListUsers.php');
    }
}

function listHalahotes()
{
    $halakha = new Halaha();
    $reqListHalaha = $halakha->getListHalaha();

//        if ($reqListHalaha === false)
//        {
//            throw new Exception('Impossible d\'afficher la liste des Halahotes!');
//        }
//        else
//        {
    require('View/adminListHalaha.php');

}

function deleteHalaha() {

    $deleteHalaha= new Halaha();
    $isdeleted = $deleteHalaha-> delete($_POST["id"]);
    return $isdeleted;


}

function editHalaha() {

    $halahaId = $_GET['id'];
    $editHalaha = new Halaha();
    $halahaToEdit = $editHalaha ->get($halahaId);
    require('View/adminEditHalaha.php');

}


function updateHalaha()
{
    print_r($_FILES);
    $editHalaha = new Halaha();
    $reqEditHalaha = $editHalaha->edit($_POST, $_FILES);
}
