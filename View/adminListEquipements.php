<?php
/**
 * Created by PhpStorm.
 * User: ESG
 * Date: 28/01/2019
 * Time: 16:32
 */
?>

<div id="list" class="listEquipements" data-type = "<?php echo $type?>">
    <section class="col-lg-12 table-responsive">
        <div class="newElement" data-href="newElementForm" align="right"><i class="fas fa-edit"></i>Créer un Nouvel Equipement</div>
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
                $jsonUser = json_encode($equipement);?>
                <tr class="objectId<?=$equipement['id']?>">
                    <td><span class="equipement_name<?=$equipement['id']?>"><?=$equipement['name']?></span></td>
                    <td><span class="edit" data-href="formEdit<?=$equipement['id']?>" data-id="<?=$equipement['id']?>"><i class="fas fa-pencil-alt"></i></span></td>
                    <td><span class="delete" data-delete='<?=$jsonUser?>'><i class="fas fa-trash"></i></span></td>
                </tr>
                <tr class="hidden" id="formEdit<?=$equipement['id']?>">
                    <td colspan="6"></td>
                </tr>
                <?php
            }
            $listEquipements->closeCursor();
            ?>
            </tbody>
        </table>
    </section>
</div>