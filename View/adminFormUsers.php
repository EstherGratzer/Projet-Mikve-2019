
    <h3 align="center">Formulaire Utilisateur</h3>
    <div class="alert alert-danger hidden" role="alert"></div>
    <div class="row">
        <div class="col-md-12">
            <form id="adminFormUsers" action="admin.php?action=updateUser" method="post">
                <div class="col-sm-12">
                    <input type="hidden" class="form-control user-id" id="idUser<?=$id?>" name="idUser" value="<?php echo $id?>"></input>
                </div>
                <div class="form-group row">
                    <label for="lastname" class="col-sm-4 col-form-label">Nom </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="lastname<?php echo $id?>" name="lastname" value="<?php echo $lastname?>"></input>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="firstname" class="col-sm-4 col-form-label">Prénom </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="firstname<?=$id?>" name="firstname" value="<?php echo $firstname?>"></input>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="login" class="col-sm-4 col-form-label">Login </label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="login<?=$id?>" name="login" value="<?php echo $login ?>"></input>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-4 col-form-label">Mot de passe </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="password<?=$id?>" name="password" value="<?php echo $password ?>"></input>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="rights_id" class="col-sm-4 col-form-label">Droit d'Accès</label>
                    <div class="col-sm-8 col-form-label">
                        <select name="rights_id" id="rights_id<?=$id?>">
                            <?php
                            foreach ($rightList as $right){
                                ?>
                                <option value="<?php echo $right['id']?>" <?php if($right['id'] == $rights_id) { ?> selected <?php }?>><?php echo $right['name']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="profils_id" class="col-sm-4 col-form-label">Photo de Profil </label>
                    <div class="col-sm-8">
                        <input type="file" class="form-control" id="profils_id<?=$id?>" name="profils_id" value="<?php echo $profils_id?>">
                    </div>
                </div>
                <br><br><br>
                <div>
                    <input type="submit" class="btn btn-success" value="Valider"/><input type="reset" class="btn btn-danger" name="Annuler" value="Annuler"/>
                </div>
            </form>
        </div>
    </div>

    <footer class="center"></footer>
