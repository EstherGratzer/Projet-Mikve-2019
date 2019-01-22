<?php
class User extends Manager
{

    public function get($id){
        $userSql = $this->db->query("SELECT * FROM users WHERE id = '{$id}'");
        return $userSql->fetch(PDO::FETCH_ASSOC);
    }

    public function createUser($firstname, $lastname, $login, $password)
    {
        $reqNewUser = $this->db->prepare('INSERT INTO users(firstname, lastname, login, password) VALUES(?, ?, ?, ?)');
        $newUser = $reqNewUser->execute(array($firstname, $lastname, $login, $password));
        return $newUser;
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
        $db = $this->dbConnect(); // même si la méthode dbConnect() est privée on est autorisé à l'appeller puisqu'on est à l'intérieur de la classe
        $req = $db->query("SELECT *
                            FROM users
                            ORDER BY id");
        return $req;
    }
}
