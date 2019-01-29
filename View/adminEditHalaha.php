<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="public/js/scriptAdmin.js"></script>
<form class="newEdit" name="editHalahaForm"  method="post" >

    <input type="hidden" name="id" value="<?=$halahaToEdit['id'] ?>">
        <h1>Edit</h1>
        Titre: <input type="text" name="titre" value="<?=$halahaToEdit['titre'] ?>"/>
        </br>
        <label >Contenu:</label>  <textarea name="contenu">    <?=$halahaToEdit['contenu'] ?>          </textarea>
        </br>
    <div >
        <input type="file" id="file" name="Picture" />
    </div>
        Photo de couv: <img src="public/images/halahotes/<?=$halahaToEdit['path'] ?>" alt="<?=$halahaToEdit['alt'] ?>">
        </br>
        <button type="submit" value="Valider"  id="btnSubmit"> Valider </button>
    <button type="button" value="Annuler" onclick="annuler()"> Annuler </button>



</form>
