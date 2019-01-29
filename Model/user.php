<?php
class User extends Manager
{

    const ADMIN_RIGHT_ID = 1;
    const USER_RIGHT_ID = 2;


    public function get($id){
        $userSql = $this->db->query("SELECT users.*, medias.id, medias.path, medias.alt 
                                                    FROM users 
                                                    LEFT JOIN medias ON users.media_id = medias.id WHERE users.id = '{$id}'");
        return $userSql->fetch(PDO::FETCH_ASSOC);
    }

    public function createUser($firstname, $lastname, $login, $password, $profil_picture_id)
    {
        $reqNewUser = $this->db->prepare('INSERT INTO users(firstname, lastname, login, password, media_id, rights_id) VALUES(?, ?, ?, ?, ?, ?)');
        $newUser = $reqNewUser->execute(array($firstname, $lastname, $login, $password, $profil_picture_id, self::USER_RIGHT_ID));
        $newUserId = $this->db->lastInsertId();
        $user = new user();
        return $user->get($newUserId);
    }


    public function getAdmin($login, $password)
    {
        $reqLogAdmin = $this->db->query("SELECT * FROM users 
                                          WHERE login = '{$login}' AND password = '{$password}' AND rights_id = 1");
        //var_dump($reqLogAdmin);

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


    public function updateRightsUser($users_id, $rights_id)
    {
        $db = $this -> dbConnect();
        $right = $db->prepare('UPDATE users
                                SET rights_id=?
                                WHERE id=? ');
        $affectedLines = $right->execute(array($rights_id, $users_id));
        return $affectedLines;
    }

    public function getListRightsUser() // OK
    {
        $db = $this->dbConnect();
        $req = $db->query("SELECT *
                            FROM rights
                            ORDER BY id");
        return $req;
    }

    public function deleteUser($users_id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare("DELETE FROM users
                            WHERE id = ?");
        $req->execute(array($users_id));
        return $req;
        //La requête marche en théorie mais dans la pratique c'est impossible car le membre a des subjects et des answers donc on peut pas le supprimer sans supprimer celles-ci
    }

    public function getListUsers()
    {
        $db = $this->dbConnect();
        $reqListUsers = $db->query("SELECT users.*, rights.name
                            FROM users
                            JOIN rights ON users.rights_id = rights.id
                            ORDER BY users.id");
        return $reqListUsers;
    }
}
