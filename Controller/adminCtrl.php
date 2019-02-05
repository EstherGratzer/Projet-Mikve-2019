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


function create()
{
    switch ($_GET['type']){
        case 'users':
            createUser();
            break;

        case 'halahotes':
            createHalahotes();
            break;

        case 'mikve':
            createMikve();
            break;

        case 'equipements':
            createEquipement();
            break;
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
            $id = $userToEdit['id']?: NULL;
            $profils_id = $userToEdit['profils_id']?: NULL;
            $lastname = $userToEdit['lastname']?: NULL;
            $firstname = $userToEdit['firstname']?: NULL;
            $login = $userToEdit['login']?: NULL;
            $password = $userToEdit['password']?: NULL;
            $rights_id = $userToEdit['rights_id']?: NULL;

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

function createUser() // OK
{
    $rights = new  Right();
    $rightList = $rights->find();

    $id = NULL;
    $profils_id = NULL;
    $lastname = NULL;
    $firstname = NULL;
    $login = NULL;
    $password = NULL;
    $rights_id = null;


    require('View/adminFormUsers.php');

}

function addUser()
{
    if (isset($_POST['idUser']) && $_POST['idUser'] != '' ) {
        updateUser();
    }
    else {
        saveUser();
    }
}

function saveUser()
{
    if(isset($_POST)){
        $profils_id = null;
        $lastname = $_POST['lastname'];
        $firstname = $_POST['firstname'];
        $login = $_POST['login'];
        $password = $_POST['password'];
        $rights_id = $_POST['rights_id'];

        $loginExists = User::checkExistingLogin($login);
        if(!$loginExists){
            if(isset($_FILES)){
                $alt = $firstname.' '.$lastname;
                $uploadedPicture = User::addProfilePicture($_FILES, $alt);

                if($uploadedPicture) {
                    $profils_id = $uploadedPicture;
                } else {
                    echo "l'image n'a pu etre uploadee.";
                }
            }


            $user = new User();
            $newUser= $user->createUser($firstname, $lastname, $login, $password, $profils_id, $rights_id);

            if ($newUser === false) {
                return false;
            } else {
                listUsers();
            }
        } else {
            return false;
        }
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
            $title = "Mise a jour équipement";
            $id = $equipementToEdit['id'];
            $name = $equipementToEdit['name'];
            require('View/adminFormEquipements.php');
        }
    }
    else {
        throw new Exception('Aucun id d\'équipement recu');
    }

}

function updateEquipement()
{
    if (isset($_POST)) {
        $equipement = new equipement();
        $updatedEquipement = $equipement->updateEquipement($_POST['idEquip'], $_POST['newName']);
        if ($updatedEquipement === false) {
            return false;
        } else {
            return true;
        }
    }
}

function deleteEquipement()
{
    if (isset($_GET['id'])) {
        $idEquip = $_GET['id'];
        $equipement = new equipement();
        $deletedEquipement = $equipement->deleteEquipement($idEquip);
        if ($deletedEquipement === false) {
            throw new Exception('Impossible de supprimer l\'équipement!');
        }

    }
    else {
        throw new Exception('Aucun id d\'équipement recu');
    }
}

function createEquipement()
{
    $title = "Nouvel équipement";
    $id = '';
    $name = '';
    require('View/adminFormEquipements.php');
}

function saveEquipement () {

    $equipement = new equipement();
    $createdEquipement = $equipement->saveEquipement($_POST['newName']);
    if ($createdEquipement === false) {
        return false;
    } else {
        listEquipements();
    }
}
