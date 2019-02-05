<?php
/**
 * Created by PhpStorm.
 * User: ESG
 * Date: 29/01/2019
 * Time: 16:00
 */
?>

<h3 align="center" ><?=$title?></h3>
<div class="row">
    <div class="col-md-12">
        <form id="form-equipement" class="form-equipement" name="adminFormEquipement" method="POST">
            <div class="col-sm-12">
                <input type="hidden" class="form-control equipement-id" id="idEquip<?=$id?>" name="idEquip" value="<?=$id?>" />
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-4 col-form-label">Nom </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="newName<?=$id?>" name="newName" value="<?=$name ?>" />
                </div>
            </div>
            <br><br><br>
            <div>
                <input type="submit" class="btn btn-success" value="Valider"/>
                <input type="reset" class="btn btn-danger" name="Annuler" value="Annuler"/>
            </div>
        </form>
    </div>
</div>
