<h3>Formulaire Utilisateur</h3>
<div class="addSuppUsers">
    <div class="col-md-6 col-md-offset-3">
        <form id="adminFormUsers" action="admin.php?action=<?=$action?>" method="post">
            <div>
                <label for="nameUser">Nom </label>
                <input type="text" class="form-control" id="nameUser" name="nameUser"><?=$nameUser?></input>
            </div>
            <div>
                <label for="firstnameUser">Prénom </label>
                <input type="text" class="form-control" id="firstnameUser" name="firstnameUser"><?=$firstnameUser?></input>
            </div>
            <div>
                <label for="loginUser">Login </label>
                <input type="email" class="form-control" id="loginUser" name="loginUser"><?=$login?></input>
            </div>
            <div>
                <label for="passwordUser">Mot de passe </label>
                <input type="password" class="form-control" id="loginUser" name="loginUser"><?=$password?></input>
            </div>
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="rightsUser">Droits d'Accès
                    <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li>1</li>
                    <li>2</li>
                    <li>3</li>
                </ul>
            </div>
            <div>
                <input type="submit" class="btn btn-success" value="<?=$btn?>"/><input type="reset" class="btn btn-danger" name="Annuler" value="Annuler"/>
            </div>
        </form>
    </div>