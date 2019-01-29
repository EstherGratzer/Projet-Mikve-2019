<?php
class User extends Manager
{
    const ADMIN_RIGHT_ID = 1;
    const USER_RIGHT_ID = 2;
    public $type = 'users';

    public function get($id){
        $userSql = $this->db->query("SELECT users.*, medias.id, medias.path, medias.alt 
                                                    FROM users 
                                                    LEFT JOIN medias ON users.media_id = medias.id WHERE users.id = '{$id}'");
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

        $updateUser = $this->db->query("UPDATE users 
                                                  SET firstname = '{$user['firstname']}',
                                                  lastname = '{$user['lastname']}',
                                                  login = '{$user['login']}',
                                                  password = '{$user['password']}',
                                                  profil_pic = '{$user['profil_pic']}',
                                                  rights_id = {$user['rights_id']} 
                                                  WHERE users.id = {$user['idUser']}");
        return $updateUser;
    }

    public function createUser($firstname, $lastname, $login, $password, $profil_picture_id)
    {
        $reqNewUser = $this->db->prepare('INSERT INTO users(firstname, lastname, login, password, media_id, rights_id) VALUES(?, ?, ?, ?, ?, ?)');
        $newUser = $reqNewUser->execute(array($firstname, $lastname, $login, $password, $profil_picture_id, self::USER_RIGHT_ID));
        $newUserId = $this->db->lastInsertId();
        $user = new user();
        return $user->get($newUserId);
    }



    public function deleteUser($users_id)
    {
        $req = $this->db->prepare("DELETE FROM users
                            WHERE id = ?");
        $req->execute(array($users_id));
        return $req;
        //La requête marche en théorie mais dans la pratique c'est impossible car le membre a des subjects et des answers donc on peut pas le supprimer sans supprimer celles-ci
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

}

