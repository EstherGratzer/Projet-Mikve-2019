<?php
class Right extends Manager
{
    public function updateRightsUser($users_id, $rights_id)
    {
    $right = $this->db->prepare('UPDATE users
                                           SET rights_id=?
                                           WHERE id=? ');
    $affectedLines = $right->execute(array($rights_id, $users_id));
    return $affectedLines;
    }

    public function find()
    {
    $reqListRights = $this->db->query("SELECT *
                                       FROM rights
                                       ORDER BY id");
    return $reqListRights->fetchAll(PDO::FETCH_ASSOC);
    }
}