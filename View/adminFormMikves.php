<h3>Formulaire Mikvé</h3>
<div class="addSuppMikve">
    <div class="col-md-6 col-md-offset-3">
        <form id="adminFormMikves" action="admin.php?action=updateMikve" method="post"> <!-- action=<?//$action?>  updateMikve ou bien createMikve-->
            <div>
                <label for="nameMikve">Nom </label>
                <input type="text" class="form-control" id="nameMikve" name="nameMikve" value="<?php echo ($mikveArray['infos']['name'])?: ''?>">
            </div>
            <div>
                <label for="addressMikve">Adresse </label>
                <input type="text" class="form-control" id="addressMikve" name="addressMikve" value="<?php echo ($mikveArray['infos']['address'])?: ''?>">
            </div>
            <div>
                <label for="phoneNumberMikve">Numéro de téléphone </label>
                <input type="tel" class="form-control" id="phoneNumberMikve" name="phoneNumberMikve" value="<?php echo ($mikveArray['infos']['phoneNumber'])?: ''?>">
            </div>
            <div>
                <label for="openningTimesMikve">Heures d'ouverture </label>
                <input type="text" class="form-control" id="openningTimesMikve" name="openningTimesMikve" value="<?php echo ($mikveArray['infos']['openningTimes'])?: ''?>">
            </div>
            <div>
                <label for="couv_idMikve">Photo de couverture </label>
                <input type="file" class="form-control" id="couv_idMikve" name="couv_idMikve" value="<?php echo ($nameMikve)?: ''?>">
            </div>
            <div>
                <label for="mediasMikve">Photos d'illustration </label>
                <input type="file" class="form-control" id="mediasMikve" name="mediasMikve" value="<?php echo ($nameMikve)?: ''?>">
            </div>
            <div>
                <input type="submit" class="btn btn-success" value="Modifier"/> <?//$btn?> <!-- ou créer -->
                <input type="reset" class="btn btn-danger" name="Annuler" value="Annuler"/>
            </div>
        </form>
    </div>