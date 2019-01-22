<?php ob_start();
?> <link rel="stylesheet" href="public/css/home.css"> <?php //grâce au require() on n'a pas besoin de marquer le chemin d'accès entier du fichier qui aurait été href="../../public/css/style.css"
$style = ob_get_clean();
$title= "Home Page";
ob_start();
?>
<div class="container categories">
    <div class="row">
        <?php foreach($categories as $category){?>
            <div class="col-sm-4">
                 <a href=<?php echo $category['link']?> > <?php echo'<img src="public/images/'.$category['image'].'">' ?></a>
                    <a href=<?php echo $category['link']?> ><?php echo $category['name']?></a>
                <p><?= $category['description'] ?></p>
            </div>
        <?php } ?>
    </div>
</div>
<?php
$content= ob_get_clean();
require('template.php');?>


