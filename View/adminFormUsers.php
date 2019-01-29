
    <h3 align="center">Formulaire Utilisateur</h3>
    <div class="addSuppUsers">
        <div class="col-md-12">
            <form id="adminFormUsers" action="admin.php?action=updateUser" method="post">
                <div class="col-sm-12">
                    <input type="hidden" class="form-control" id="idUser" name="idUser" value="<?=$userToEdit['id']?>"></input>
                    <input type="hidden" class="form-control" id="profil_pic" name="profil_pic" value="<?=$userToEdit['profil_pic']?>"></input>
                </div>
                <div class="form-group row">
                    <label for="lastname" class="col-sm-4 col-form-label">Nom </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="lastname" name="lastname" value="<?=$userToEdit['lastname']?>"></input>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="firstname" class="col-sm-4 col-form-label">Prénom </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="firstname" name="firstname" value="<?=$userToEdit['firstname']?>"></input>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="login" class="col-sm-4 col-form-label">Login </label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="login" name="login" value="<?=$userToEdit['login']?>"></input>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-4 col-form-label">Mot de passe </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="password" name="password" value="<?=$userToEdit['password']?>"></input>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="rights_id" class="col-sm-4 col-form-label">Droit d'Accès</label>
                    <div class="col-sm-8 col-form-label">
                        <select name="rights_id" id="rights_id">
                            <?php
                            foreach ($rightList as $right){
                                ?>
                                <option value="<?php echo $right['id']?>" <?if($right['id'] == $userToEdit['rights_id']) {?> selected <?php }?>"><?php echo $right['name']?></option>
                                <?php
                            }
                            ?>
                        </select>
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
