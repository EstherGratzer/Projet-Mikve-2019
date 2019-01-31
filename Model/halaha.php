<?php
/**
 * Created by PhpStorm.
 * User: leait
 * Date: 22/01/2019
 * Time: 09:24
 */

class halaha extends Manager
{

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
        $imageId = null;
        if($image['Picture']['size'] > 0){
            $imageId = $this->addImage($image, $halaha['titre']);
        }

        $this->editHalahaContent($halaha, $imageId);

    }

    private function editHalahaContent($halaha, $imageId){
        $id = $halaha['id'];
        $titre = $halaha['titre'];
        $contenu = $halaha['contenu'];

        $edithalaha= "UPDATE halahotes
          set titre='{$titre}' , contenu='{$contenu}', media_id = '{$imageId}' WHERE id={$id}";
        $isedited = $this->db->query($edithalaha);
        var_dump($isedited);

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

}




