<?php ob_start();
?> <link rel="stylesheet" href="public/css/halaha.css"> <?php //grâce au require() on n'a pas besoin de marquer le chemin d'accès entier du fichier qui aurait été href="../../public/css/style.css"
$style = ob_get_clean();
$title= "Halaha page";
ob_start();
?>


<div class="container">
    <h1> <strong><?php echo $halaha['titre'] ?></strong></h1>
   <div class="container"><?php echo'<img src="public/images/'.$halaha['image'].'">' ?></div>

 <p><?php  echo $halaha['contenu'] ?> </p>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

