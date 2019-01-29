<div class="listHalaha">
    <section class="col-lg-12 table-responsive">

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
                <tr class="halaha-<?=$halakha['id'] ?>">
                    <td><?=$halakha['titre'] ?></td>
<!--                    <td>--><?//= $users['image']?><!--</td>-->

                    <td><span class="edit" data-href="formEdit<?=$halakha['id'] ?>"><i class="fas fa-pencil-alt"></i></span></td>
                    <td><span class="delete-halaha" data-halaha='<?=$jsonHalaha?>'><i class="fas fa-trash"></i></span></td>
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
