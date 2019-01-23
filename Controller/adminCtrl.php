<?php
session_start();
// Chargement des classes
require_once('Model/manager.php');
require_once('Model/user.php');
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
        $user = new Users();
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

function createUser($firstname, $lastname, $login, $password) // OK
{
    $user = new user();
    $affectedLines = $user->createUser($firstname, $lastname, $login, $password);
    if ($affectedLines === false)
    {
        throw new Exception('Impossible d\'ajouter le membre !');
    }
    else
    {
        //header('Location: index.php?action=showSubject&id='.$subjects_id);
    }
}

function updateUserRights($members_id, $rights_id) // OK
{
    $user = new user();
    $affectedLines = $user->updateRights($members_id, $rights_id);
    if ($affectedLines === false)
    {
        throw new Exception('Impossible de modifier les droits du membre !');
    }
    else
    {
        //header('Location: index.php?action=listMembers');
    }
}

function listRightsUser() // OK
{
    $user = new user();
    $listRights = $user->getListRightsUser();
    //$nb_Items = $mikve->getCountItems('mikves');
    //require('view/frontend/home.php');
}

function deleteUser($users_id) // OK
{
    $user = new user();
    $affectedLines = $user->deleteUser($users_id);
    if ($affectedLines === false)
    {
        throw new Exception('Impossible de supprimer le membre !');
    }
    else
    {
        //header('Location: index.php?action=listMembers');
    }
}

function listUsers() // OK
{
    $user = new User();
    $reqListUsers = $user->getListUsers();

    if ($reqListUsers === false)
    {
        throw new Exception('Impossible d\'afficher la liste des Utilisateurs !');
    }
    else
    {
        require('View/adminListUsers.php');
    }
}

