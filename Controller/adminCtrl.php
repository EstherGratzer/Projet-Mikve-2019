<?php
session_start();
// Chargement des classes
require_once('Model/manager.php');
require_once('Model/user.php');
require_once('Model/rights.php');
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
    $type = $user->type;
    if ($reqListUsers === false)
    {
        throw new Exception('Impossible d\'afficher la liste des Utilisateurs !');
    }
    else
    {
        require('View/adminListUsers.php');
    }
}

function edit()
{
    switch ($_GET['type']){
        case 'users':
            editUser();
            break;

        case 'halahotes':
            editHalahotes();
            break;
    }

}

function editUser()
{
    //je recupere l'idUser, et dans la requete je fait un select * de users pour tout reafficher dans le formulaire
    if (isset($_GET['id']))
        {
            $userId = $_GET['id'];

            $User = new User();
            $userToEdit = $User->get($userId);

            if (count($userToEdit)>0)
            {
                $rights = new  Right();
                $rightList = $rights->find();
            }
        }

        if ($userToEdit === false)
        {
            echo'Impossible d\'afficher l\'utilisateur !';
        }
        else {
            require('View/adminFormUsers.php');

        }
}

function updateUser()
{
    if (isset($_POST))
    {

        $User = new User;
        $updateUser = $User->updateUser($_POST);
    }

    if ($updateUser === false)
    {
        echo'Impossible de modifier l\'utilisateur !';
    }
    else {
        listUsers();

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
    $user = new User();
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



}
