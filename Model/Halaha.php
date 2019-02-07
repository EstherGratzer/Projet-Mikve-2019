<?php
/**
 * Created by PhpStorm.
 * User: leait
 * Date: 22/01/2019
 * Time: 09:24
 */

class halaha extends Manager
{
    public $type = 'halahotes';
    public function get($id){

        $halahaSql = "SELECT halahotes.*, medias.id as media_id, medias.path, medias.alt FROM halahotes 
                      LEFT JOIN medias on medias.id = halahotes.media_id
                      WHERE halahotes.id = {$id}";

        $req = $this->db->query($halahaSql);
        return $req->fetch(PDO::FETCH_ASSOC);

    }

    public function find($options = [])
    {
        $sqlHalaha = "SELECT * FROM halahotes ";

        if(!empty($options['currentHalaha'])) {
            $sqlHalaha .= "WHERE id != {$options['currentHalaha']}";
        }

        $req = $this->db->query($sqlHalaha);
        return $req;
    }

    public function getListHalaha()
    {
        $db = $this->dbConnect();
        $reqListHalaha = $db->query("SELECT id, titre
                            FROM halahotes
                          ");
        return $reqListHalaha;
    }


    public function delete($halahaId)
    {
        $deletehalaha = "DELETE FROM halahotes WHERE id = {$halahaId}";
        $isdeleted = $this->db->query($deletehalaha);

        return $isdeleted;
    }

    public function edit ($halaha, $image = null)
    {
        //est ce qu'une photo a ete uploadee
        if($image['Picture']['size'] > 0){
            $imageId = $this->addImage($image, $halaha['titre']);
        }
        elseif (isset($halaha['media_id'])){
            $imageId = $halaha['media_id'];
        }

        $this->editHalahaContent($halaha, $imageId);

    }

    public function saveHalakha($halahaToAdd, $uploadedPicture = []){
        $imageId = null;
        if($uploadedPicture['Picture']['size'] > 0){
            $imageId = $this->addImage($uploadedPicture, $halahaToAdd['titre']);
        }

        $this->save($halahaToAdd, $imageId);
    }

    private function editHalahaContent($halaha, $imageId){
        $id = $halaha['id'];
        $titre = $halaha['titre'];
        $contenu = $halaha['contenu'];

        $edithalaha= "UPDATE halahotes
          set titre='{$titre}' , contenu='{$contenu}', media_id = '{$imageId}' WHERE id={$id}";
        $isedited = $this->db->query($edithalaha);

        return $isedited;
    }

    private function addImage($image, $alt){
        $picture = $image['Picture']['name'];
        $tmp_file = $image['Picture']['tmp_name'];

        $req = $this->db->query("INSERT INTO medias(path, alt)
                                     VALUES('{$picture}', '{$alt}') ");
        $lastId = $this->db->lastInsertId();

        if(!move_uploaded_file($tmp_file, "public/images/halahotes/".$picture))
        {
            exit("creation de l'image echouee");
        }
        return $lastId;
    }


   public function save ($halaha, $media_id = null)
   {
       $req = $this->db->prepare("INSERT INTO halahotes (titre,contenu,media_id)  VALUES (?, ?, ?)");
        $req->execute(array($halaha['titre'], $halaha['contenu'], $media_id));
        return $req;
   }

    
}




