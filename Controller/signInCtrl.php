<?php
/**
 * Created by PhpStorm.
 * User: ESG
 * Date: 17/01/2019
 * Time: 15:37
 */

// Chargement des classes
require_once('Model/manager.php');
require_once('Model/user.php');

class signInCtrl {

    public $errors = [];

    public function index() {
        $errors = $this->errors;
        $firstname = $lastname = $login = $password = '';
        require("View/signIn.php");
    }

    public function dologin() {
        if (!isset($_POST['login']) && !isset($_POST['password']) ) {
            $this->errors[] = 'impossible de se connecter';
            return false;
        }
        else {
            $user = new user();
            $checkUser = $user -> connectUser($_POST['login'], $_POST['password']);

            if($checkUser){
                $currentUser = $user->get($checkUser['id']);
                $_SESSION['user'] = $currentUser;
                header("location:index.php");
                exit();
            }
        }
    }

    public function signUp () {
        $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
        $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
        $login = isset($_POST['login']) ? $_POST['login'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $profil_picture_id = null;
        $this->validateEmptyFields($firstname, $lastname, $login, $password);
        $isExistindMember = User::checkExistingLogin($login);
        if($isExistindMember){
            $this->errors[] = 'Ce login existe deja. Essayez un autre ou connectez vous.';
        }

        if(count($this->errors) > 0){
            $errors = $this->errors;
            require("View/signIn.php");
        }
        else {
            if ($_FILES ["profils_id"]['size'] > 0){

                $alt = $firstname.' '.$lastname;
                $uploadedPicture = User::addProfilePicture($_FILES, $alt);
                if($uploadedPicture) {
                    $profil_picture_id = $uploadedPicture;
                } else {
                    echo "l'image n'a pu etre uploadee.";
                }
            }
            $user = new user();
            $createdUser = $user->createUser($firstname, $lastname, $login, $password, $profil_picture_id);
            if (!$createdUser) {
                echo 'Impossible d\'ajouter le membre !';
            }
            else {
                //rentrer le user en session
                $_SESSION['user'] = $createdUser;
                header("location:index.php");
                exit();
            }
        }
    }

    private function validateEmptyFields($firstname, $lastname, $login, $password) {
        if ($firstname == '' || $lastname == '' || $login == '' || $password == '') {
            $this->errors[] = 'Un ou plusieurs champs n\'ont pas été correctement remplis';
            return false;
        }
        return true;
    }


    public function logOut() {
        session_destroy();
        header('location:index.php');
    }

}
