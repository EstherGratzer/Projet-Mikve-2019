<?php
require_once("Model/manager.php");
class Comment extends manager
{
    public function createComment($comment, $mikves_id, $users_id) // OK
    {
        echo "salut";
        $db = $this->dbConnect();
        $req = $db->prepare("INSERT INTO comments (comment, date, mikves_id, users_id)
                            VALUES (?, NOW(), ?, ?)");
        $req->execute(array($comment, $mikves_id, $users_id));
        return $req;
    }
    public function updateComment($comments_id,  $comment) // OK
    {
        $db = $this -> dbConnect();
        $comments = $db->prepare('UPDATE comments
                                SET comment=?, date = NOW()
                                WHERE id=? ');
        $affectedLines = $comments->execute(array($comment, $comments_id));
        return $affectedLines;
    }
    public function deleteComment($comments_id) // OK
    {
        $db = $this->dbConnect();
        $req = $db->prepare("DELETE FROM comments
                            WHERE id = ?");
        $req->execute(array($comments_id));
        return $req;
    }
    public function getListComments($mikves_id, $start) // OK
    {
        $db = $this->dbConnect();
        $req = $db->prepare("SELECT comments.id AS comments_id,
                                              comments.comment,
                                              DATE_FORMAT(comments.date, 'Le %d/%m/%Y à %Hh%imin%ss') AS creation_date_fr,
                                              comments.mikves_id,
                                              comments.users_id,
                                              mikves.id AS mikves_id,
                                              users.id AS users_id,
                                              users.firstname,
                                              users.lastname,
                                              users.profil_pic
                                        FROM comments
                                        INNER JOIN mikves
                                        ON comments.mikves_id = mikves.id
                                        INNER JOIN users
                                        ON comments.users_id = users.id
                                        WHERE mikves_id = ?
                                        ORDER BY date DESC");/*LIMIT ".$start.", 2"*/
        $req->execute(array($mikves_id));
        return $req;
    }
}