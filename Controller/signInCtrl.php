<?php
/**
 * Created by PhpStorm.
 * User: ESG
 * Date: 17/01/2019
 * Time: 15:37
 */

// Chargement des classes
require_once('Model/Manager.php');
require_once('Model/Users.php');

class signInCtrl {

    public $errors = [];

    public function index() {
        $errors = $this->errors;
        $firstname = $lastname = $login = $password = '';
        require("View/signIn.php");
    }

    public function logIn() {
        echo 'function logIn ';
    }


    public function signUp () {

        $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
        $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
        $login = isset($_POST['login']) ? $_POST['login'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $this->validateEmptyFields($firstname, $lastname, $login, $password);
        $this->validateExistingLogin($login);


        if(!empty($this->errors)){
            $errors = $this->errors;
            require("View/signIn.php");
        }
        else {
            $user = new Users();
            $creatingUser = $user->createUser($firstname, $lastname, $login, $password);
            if ($creatingUser === false) {
                echo 'Impossible d\'ajouter le membre !';
            }
            else {
                echo 'insciption reussi';
            }
        }

    }

    private function validateEmptyFields($firstname, $lastname, $login, $password) {
        if ($firstname == '' || $lastname == '' || $login == '' || $password == '') {
            $this->errors[] = 'Un ou plusieurs champs n\'ont pas été correctement remplis';
        }
    }

    private function validateExistingLogin($login){
        $verifiUser = new Users();
        $existingUser = $verifiUser->getByLogin($login);
        if ($existingUser->rowCount() > 0) {
            $this->errors[] = 'Ce login existe deja. Essayez un autre ou connectez vous.';
        }
        return false;
    }
}



