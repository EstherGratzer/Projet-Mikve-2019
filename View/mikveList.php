<?php ob_start();
?> <link rel="stylesheet" href="public/css/mikveList.css">
<?php //grâce au require() on n'a pas besoin de marquer le chemin d'accès entier du fichier qui aurait été href="../../public/css/style.css"
$style = ob_get_clean();
$title = 'listMikves Page'; //on définit le contenu de title pour le mettre dans template.php
ob_start();?>
<h4>Liste des Mikvaotes</h4>
<section class="row">
    <?php while ($list = $listMikves->fetch())
    { ?>
        <div class="col-xs-5 col-sm-4 col-md-3" id="mikves_id_<?php echo $list['id'] ?>">
            <img src="public/images/<?php echo $list['path'] ?>" alt="<?php echo $list['alt'] ?>" class="col-xs-12 col-sm-12 col-md-12">
            <h4 class="col-xs-12 col-sm-12 col-md-12"><i class="fas fa-tint"></i> <a href="mikve.php?action=showMikve&amp;mikves_id=<?php echo $list['id'] ?>"><?php echo $list['name'] ?></a></h4>
            <p class="col-xs-12 col-sm-12 col-md-12"><i class="fas fa-map-marker-alt"></i> <?php echo $list['address'] ?></p>
        </div>
    <?php }
$listMikves->closeCursor();
?>
</section>
<?php // require('view/modules/pagination.php');
$content = ob_get_clean();
require('template.php'); ?>