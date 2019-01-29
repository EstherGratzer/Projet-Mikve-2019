<?php
/**
 * Created by PhpStorm.
 * User: ESG
 * Date: 28/01/2019
 * Time: 16:32
 */
?>
<div class="listEquipements" >
    <section class="col-lg-12 table-responsive">
        <div class="newEquipement" align="right"><a href="admin.php?action=addEquipement"><i class="fas fa-edit"></i>Ajouter un nouvel equipement</a></div>
        <table class="table table-striped table-condensed">
            <thead>
            <tr>
                <th>Nom de l'équipement</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            while ($equipement = $listEquipements->fetch())
            {
                ?>
                <tr>
                    <td><?=$equipement['name'] ?></td>
                    <td><a href="#modalEquipementUpdate" data-toggle="modal"><i class="fas fa-pencil-alt"></i></a></td>
                    <td><a href="admin.php?action=deleteEquipement&id=<?=$equipement['id'] ?>"><i class="fas fa-trash"></i></a></td>
                </tr>
                <?php
            }
            $listEquipements->closeCursor();
            ?>
            </tbody>
        </table>

        <!-- Modal HTML equipement update-->
        <div id="modalEquipementUpdate" class="modal fade">
            <div class="modal-dialog modal-login">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Modifier un équipement</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="#" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" value="<?= $equipement['name'] ?>">
                            </div>
                            <div class="buttons">
                                <button type="submit" class="btn btn-success" >Modifier</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Annuler</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </section>
</div>