<?php
session_start();
// Chargement des classes
require_once('Model/manager.php');
require_once('Model/user.php');
require_once('Model/equipement.php');
require_once('Model/mikve.php');
require_once('Model/halaha.php');
require_once('Model/rights.php');
function index()
{
    //require ("View/adminFormMikves.php");
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
            $currentUser = $user->get($getAdmin['id']);
            $_SESSION['user'] = $currentUser;
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

function edit()
{
    switch ($_GET['type']){
        case 'users':
            editUser();
            break;

        case 'halahotes':
            editHalahotes();
            break;

        case 'mikve':
            editMikve();
            break;

        case 'equipements':
            editEquipement();
            break;
    }

}

function delete()
{
    switch ($_GET['type']){
        case 'users':
            echo "delete function";
            deleteUser();
            break;

        case 'halahotes':
            deleteHalahotes();
            break;

        case 'mikve':
            deleteMikve();
            break;

        case 'equipements':
            deleteEquipement();
            break;
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
    if (isset($_POST)) {

        $User = new User;
        $updateUser = $User->updateUser($_POST);
    }

    if ($updateUser === false) {
        return false;
    } else {
        return true;

    }
}

function deleteUser() // OK
{
    if (isset($_GET['id']))
    {
        //echo "deleteuser function";
        $userId = $_GET['id'];

        $User = new User;
        $userToDelete = $User->deleteUser($userId);
        //var_dump($userToDelete);
        if ($userToDelete === false)
        {
            throw new Exception('Impossible de supprimer le membre !');
        }
        else
        {
            listUsers();
        }
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

function listMikves() // OK
{
    $mikve = new mikve();
    //if (isset($_GET['page']))
    //{
    //  $start = ($_GET['page']*2)-2;
    // $listMikves = $mikve->getListMikves($start);
    //}
    //else
    //{
    $reqListMikves = $mikve->getListMikves();
    //}
    //$nb_Items = $mikve->getCountItems('mikves');
    require('view/adminListMikves.php');
}


function createMikve($name, $address, $phoneNumber, $openingTimes, $prices_id, $equipements_id, $images_id) // OK
{
    $mikve = new mikve();
    $affectedLines = $mikve->createMikve($name, $address, $phoneNumber, $openingTimes, $prices_id, $equipements_id, $images_id); // Appel d'une fonction de cet objet
    if ($affectedLines === false)
    {
        throw new Exception('Impossible d\'ajouter le nouveau mikve !');
    }
    else
    {
        //header('Location: index.php?action=listSubjects');
    }
}
function editMikve() // OK
{
    //http://localhost/DeveloppersInstitute/Projet-Mikve-2019/admin.php?action=editMikve&mikves_id=3
    if (isset($_GET['mikves_id']))
    {
        $mikves_id = $_GET['mikves_id'];
        $tables_id = 1;
        $mikve = new mikve();
        $mikveArray = $mikve->getOneMikve($mikves_id, $tables_id);
        require('View/adminFormMikves.php');
    }
}
function updateMikve($mikves_id, $name, $address, $phoneNumber, $openingTimes, $prices_id, $equipements_id, $images_id) // OK
{
    $mikve = new mikve();
    $affectedLines = $mikve->updateMikve($mikves_id, $name, $address, $phoneNumber, $openingTimes, $prices_id, $equipements_id, $images_id);
    if ($affectedLines === false)
    {
        throw new Exception('Impossible de modifier le mikve !');
    }
    else
    {
        //header('Location: index.php?action=listSubject');
    }
}
function deleteMikve($mikves_id) // OK
{
    $mikve = new mikve();
    $affectedLines = $mikve->deleteMikve($mikves_id);
    if ($affectedLines === false)
    {
        throw new Exception('Impossible de supprimer le mikve !');
    }
    else
    {
        //header('Location: index.php?action=listSubjects');
    }
}

/*fonctions concernant les équipements*/

function listEquipements()
{
    $equipements = new equipement();
    $listEquipements = $equipements->getListEquipements();
    $type = $equipements->type;
    if ($listEquipements === false)
    {
        throw new Exception('Impossible d\'afficher la liste des équipements !');
    }
    else
    {
        require('View/adminListEquipements.php');
    }
}

function editEquipement()
{
    if (isset($_GET['id'])) {
        $equipement = new equipement();
        $equipementToEdit = $equipement-> getOneEquipement($_GET['id']);
        if ($equipementToEdit === false) {
            throw new Exception('Impossible d\'afficher l\'équipement !');
        }
        else {
            require('View/adminFormEquipements.php');
        }
    }
    else {
        throw new Exception('Aucun id d\'équipement recu');
    }

}

function updateEquipement()
{
    if (isset($_GET)) {
        $equipement = new equipement();
        $updatedEquipement = $equipement->updateEquipement($_GET['idEquip'], $_GET['newName']);
        if ($updatedEquipement === false) {
            return false;
        } else {
            return true;
        }
    }
}

function deleteEquipement($id)
{
    if (isset($_GET['id'])) {
        $equipement = new equipement();
        $deletedEquipement = $equipement->deleteEquipement($id);
        if ($deletedEquipement === false) {
            throw new Exception('Impossible de supprimer l\'équipement!');
        }
        else {
            require('View/adminFormEquipements.php');
        }
    }
    else {
        throw new Exception('Aucun id d\'équipement recu');
    }
}

function createEquipement($name)
{
    $equipement = new equipement();
    $newEquipement = $equipement->addEquipement($name);
    if ($newEquipement === false)
    {
        throw new Exception('Impossible d\'ajouter l\'équipement!');
    }
}




