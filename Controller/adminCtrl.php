<?php
// Chargement des classes
require_once('Model/manager.php');
require_once('Model/user.php');
function index()
{
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
    $user = new user();
    $users = $user->getListUsers();
    $right = new Rights();
    $rights = $right->getListRights();
    if ($users === false)
    {
        throw new Exception('Impossible d\'afficher les membres du forum !');
    }
    else
    {
        //require('view/frontend/admin.php');
    }
}

