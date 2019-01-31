<div id="list" class="listUsers" data-type = "<?php echo $type?>">
    <section class="col-lg-12 table-responsive">
        <div class="newUser" align="right"><i class="fas fa-edit"></i>Créer un Nouvel Utilisateur</div>
        <table class="table table-striped table-condensed">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Login</th>
                <th>Droits d'Accès</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            while ($users = $reqListUsers->fetch())
            {
                $jsonUser = json_encode($users);
                ?>
                <tr class="objectId<?=$users['id'] ?>">
                    <td><span class="lastname<?=$users['id'] ?>"><?=$users['lastname'] ?></span></td>
                    <td><span class="firstname<?=$users['id'] ?>"><?= $users['firstname']?></span></td>
                    <td><span class="login<?=$users['id'] ?>"><?= $users['login']?></span></td>
                    <td><span class="rightName<?=$users['id'] ?>"><?= $users['name']?></span></td>
                    <td><span class="edit" data-href="formEdit<?=$users['id'] ?>" data-id="<?=$users['id'] ?>"><i class="fas fa-pencil-alt"></i></span></td>
                    <td><span class="delete" data-delete='<?=$jsonUser?>'><i class="fas fa-trash"></i></span></td>
                </tr>
                <tr class="hidden" id="formEdit<?=$users['id'] ?>">
                    <td colspan="6"></td>
                </tr>
            <?php }
            $reqListUsers->closeCursor();
            ?>
            </tbody>
        </table>
    </section>
</div>