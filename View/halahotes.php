<?php ob_start();
?>
<link rel="stylesheet" href="public/css/halaha.css">
<script src="public/js/script.js"></script>
<?php //grâce au require() on n'a pas besoin de marquer le chemin d'accès entier du fichier qui aurait été href="../../public/css/style.css"
$style = ob_get_clean();
$title= "halaha page";
ob_start();
?>


<div class="container" id="halahaContainer">
    <?php require ('View/halahaContent.php'); ?>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

