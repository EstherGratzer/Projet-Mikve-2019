<?php
require_once('Model/medias.php');

class User extends Manager
{
    const ADMIN_RIGHT_ID = 1;
    const USER_RIGHT_ID = 3;
    public $type = 'users';

    public function get($id){
        $userSql = $this->db->query("SELECT users.*, medias.id as media_id, medias.path, medias.alt 
                                                    FROM users 
                                                    LEFT JOIN medias ON users.profils_id = medias.id WHERE users.id = '{$id}'");
        return $userSql->fetch(PDO::FETCH_ASSOC);
    }

    public function getListUsers()
    {
        $reqListUsers = $this->db->query("SELECT users.*, rights.name
                            FROM users
                            JOIN rights ON users.rights_id = rights.id
                            ORDER BY users.id");
        return $reqListUsers;
    }

    public function updateUser($user)
    {

        $userMediaId = ($user['profils_id']) ?: 'null';
        $sql = "UPDATE users 
                SET firstname = '{$user['firstname']}',
                    lastname = '{$user['lastname']}',
                    login = '{$user['login']}',
                    password = '{$user['password']}',
                    profils_id = $userMediaId,
                    rights_id = {$user['rights_id']} 
                    WHERE users.id = {$user['idUser']}";

        $updateUser = $this->db->query($sql );
        return $updateUser;
    }

    public function createUser($firstname, $lastname, $login, $password, $profil_picture_id = null, $rights_id = self::USER_RIGHT_ID)
    {
        $reqNewUser = $this->db->prepare('INSERT INTO users(firstname, lastname, login, password, profils_id, rights_id) VALUES(?, ?, ?, ?, ?, ?)');
        $newUser = $reqNewUser->execute(array($firstname, $lastname, $login, $password, $profil_picture_id, $rights_id));
        $newUserId = $this->db->lastInsertId();
        $user = new user();
        return $user->get($newUserId);
    }


    public function deleteUser($userId)
    {
        //var_dump($userId);
        $deleteUser = "DELETE FROM users WHERE id = {$userId}";
        $isdeleted = $this->db->query($deleteUser);

        return $isdeleted;

    }

    public function getAdmin($login, $password)
    {
        $reqLogAdmin = $this->db->query("SELECT * FROM users 
                                          WHERE login = '{$login}' AND password = '{$password}' AND rights_id = 1");

        return $reqLogAdmin->fetch(PDO::FETCH_ASSOC);
    }

    public function getByLogin($login){
        $reqLogin = $this->db->query("SELECT login
                                        FROM users
                                        WHERE login ='{$login}'");
        return $reqLogin;
    }

    public function connectUser($login, $password)
    {
        $reqLogUser = $this->db->query("SELECT * FROM users 
                                                    WHERE login = '{$login}' AND password = '{$password}'");
        //var_dump($reqLogUser);
        return $reqLogUser->fetch(PDO::FETCH_ASSOC);
    }


    public static function checkExistingLogin($login){
        $user = new User();
        $existingUser = $user->getByLogin($login);
        return ($existingUser->rowCount() > 0) ? true : false;
    }

    public static function addProfilePicture($tmpPicture, $alt){
        $path = $tmpPicture['profils_id']['name'] ? : '';
        $userPic = new Medias();
        $insertedProfilPicId = $userPic->insertUserPic($path, $alt);
        if (!$insertedProfilPicId) {
            return false;
        }
        return $insertedProfilPicId;
    }
}

