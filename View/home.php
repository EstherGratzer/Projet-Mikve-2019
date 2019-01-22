<?php ob_start();
?> <link rel="stylesheet" href="public/css/home.css"> <?php //grâce au require() on n'a pas besoin de marquer le chemin d'accès entier du fichier qui aurait été href="../../public/css/style.css"
$style = ob_get_clean();
$title= "Home Page";
ob_start();
?>
<div class="container slide">

</div>
<?php include_once 'homepageCategories.php' ?>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>

