<?php
/**
 * Created by PhpStorm.
 * User: ESG
 * Date: 21/01/2019
 * Time: 13:04
 */

class Medias extends Manager
{
    public function insertUserPic($path, $alt)
    {
        $db = $this -> dbConnect();
        $reqNewImgUser = $db->prepare('INSERT INTO medias(path, alt, tables_id) VALUES(?, ?, 6)');
        $result = $reqNewImgUser->execute(array($path, $alt));

        $last_id = $db->lastInsertId();
        $upload_dir = 'public/images/users';
        $upload_file = basename($_FILES['profil_pic']['name']);
        move_uploaded_file($_FILES['profil_pic']['tmp_name'], "$upload_dir/$upload_file");
        return $last_id;
    }
}