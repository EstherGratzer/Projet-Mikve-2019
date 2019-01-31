<?php
/**
 * Created by PhpStorm.
 * User: ESG
 * Date: 29/01/2019
 * Time: 16:00
 */
?>

<h3 align="center">Mise à jour équipement</h3>
    <div class="col-md-12">
        <form class="editEquipement" name="adminFormEquipement" method="post">
            <div class="col-sm-12">
                <input type="hidden" class="form-control equipement-id" id="idEquip<?=$equipementToEdit['id']?>" name="idEquip" value="<?=$equipementToEdit['id']?>" />
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-4 col-form-label">Nom </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="newName<?=$equipementToEdit['id']?>" name="newName" value="<?=$equipementToEdit['name']?>" />
                </div>
            </div>
            <br><br><br>
            <div>
                <input type="submit" class="btn btn-success" value="Valider"/>
                <input type="reset" class="btn btn-danger" name="Annuler" value="Annuler"/>
            </div>
        </form>
    </div>
