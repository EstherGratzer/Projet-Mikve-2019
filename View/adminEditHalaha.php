<div class="row">
    <div class="col-md-12">
<form class="formHalaha" name="editHalahaForm"  method="post" >
   <div class="col-sm-12">
    <input type="hidden" class="halaha-id"  name="id" value="<?=$id ?>">
   </div>
        <h1>Edit</h1>
        Titre: <input type="text" id="titre<?=$id ?>" name="titre" value="<?=$titre?>"/>
        <br>
        <label >Contenu:</label>  <textarea name="contenu">    <?=$contenu ?>          </textarea>
        <br>
        <div >
            <input type="file" id="file" name="Picture" />
        </div>
    <div class="halaha-image<?=$id ?>">
        <input type="hidden" id="media_id" name="media_id" value="<?=$media_id ?>">
        <?php
        if (!empty($media_id)) { ?>
            Photo de couv: <img src="public/images/halahotes/<?=$path ?>" alt="<?=$alt ?>">
            <button type="button" id="supprimer<?=$id ?>"  name="supprimer "class="btn btn-danger delete-picture"  value="supprimer"> Supprimer </button>
        <?php } ?>
    </div>

    <br>
        <button type="submit"   class="btn btn-success" value="Valider"  id="btnSubmit"> Valider </button>
    <button type="reset" class="btn btn-danger"  value="Annuler"> Annuler </button>
</form>
    </div>
</div>
