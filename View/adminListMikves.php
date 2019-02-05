<div class="listMikves">
    <section class="col-lg-12 table-responsive">
        <div class="newMikve" align="right"><i class="fas fa-edit"></i>Créer un nouveau Mikvé</div>
        <table class="table table-striped table-condensed">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Adresse</th>
                <th>Téléphone</th>
                <th>Heures d'ouverture</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            while ($mikves = $reqListMikves->fetch())
            { ?>
                <tr>
                    <td><?=$mikves['name'] ?></td>
                    <td><?=$mikves['street']?></td>
                    <td><?=$mikves['phoneNumber']?></td>
                    <td><?=$mikves['openningTimes']?></td>
                    <td><a href="adminFormMikves.php"><i class="fas fa-pencil-alt"></i></a></td>
                    <td><i class="fas fa-trash"></i></span></td>
                </tr>
            <?php }
            $reqListMikves->closeCursor();
            ?>
            </tbody>
        </table>
    </section>
</div>