<div id="list" class="listHalaha" data-type = "<?php echo $type?>">
    <section class="col-lg-12 table-responsive">
        <div class="newElement" data-href="newElementForm" align="right"><i class="fas fa-edit"></i>Créer un Nouvelle Halaha</div>

        <table class="table table-striped table-condensed">
            <thead>
            <tr>
                <th>Titre</th>
<!--                <th>image</th>-->


            </tr>
            </thead>
            <tbody>
            <?php
            while ($halakha = $reqListHalaha->fetch(PDO::FETCH_ASSOC))
            {
                $jsonHalaha = json_encode($halakha);
                ?>
                <div id="alert_message"></div>
                <tr class="objectId<?=$halakha['id'] ?>">
                    <td><span class="titre-halaha<?=$halakha['id'] ?>"><?=$halakha['titre'] ?></span></td>
                    <td><span class="edit" data-href="formEdit<?=$halakha['id'] ?>" data-id="<?=$halakha['id'] ?>"><i class="fas fa-pencil-alt"></i></span></td>
                    <td><span class="delete" data-delete='<?=$jsonHalaha?>'><i class="fas fa-trash"></i></span></td>
                </tr>
                <tr class="hidden" id="formEdit<?=$halakha['id'] ?>">
                    <td colspan="3"></td>
                </tr>
                <?php
            }
           $reqListHalaha->closeCursor();
            ?>
            </tbody>
        </table>
    </section>
</div>

