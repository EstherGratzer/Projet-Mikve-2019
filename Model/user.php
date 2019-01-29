<?php
class User extends Manager
{

    public $type = 'users';

    public function get($userId){
        $userSql = $this->db->query("SELECT * FROM users WHERE id = '{$userId}'");
        return $userSql->fetch(PDO::FETCH_ASSOC);
    }

    public function getAdmin($login, $password)
    {
        $reqLogAdmin = $this->db->query("SELECT * FROM users 
                                          WHERE login = '{$login}' AND password = '{$password}' AND rights_id = 1");
        //var_dump($reqLogAdmin);

        return $reqLogAdmin->fetch(PDO::FETCH_ASSOC);
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

    public function createUser($firstname, $lastname, $login, $password)
    {
        $reqNewUser = $this->db->prepare('INSERT INTO users(firstname, lastname, login, password) VALUES(?, ?, ?, ?)');
        $newUser = $reqNewUser->execute(array($firstname, $lastname, $login, $password));
        return $newUser;
    }



    public function deleteUser($users_id)
    {
        $req = $this->db->prepare("DELETE FROM users
                            WHERE id = ?");
        $req->execute(array($users_id));
        return $req;
        //La requête marche en théorie mais dans la pratique c'est impossible car le membre a des subjects et des answers donc on peut pas le supprimer sans supprimer celles-ci
    }

}

