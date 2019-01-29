<?php ob_start(); ?>
<link rel="stylesheet" href="public/css/mikve.css">
<script src="public/js/mikve.js" type="application/javascript"></script>
<?php //grâce au require() on n'a pas besoin de marquer le chemin d'accès entier du fichier qui aurait été href="../../public/css/style.css"
$style = ob_get_clean();
$title = 'Mikve Page'; //on définit le contenu de title pour le mettre dans template.php
ob_start(); //on définit le contenu de content pour le mettre dans template.php
//print_r ($mikveArray) ?>
<section id="mikves_id_<?php echo $mikveArray['infos']['id'] ?>">
    <section class="row">
        <img id="photo_couv" class="col-xs-12 col-sm-12 col-md-12" src="public/images/<?php echo $mikveArray['photo_couv']['path'] ?>" alt="<?php echo $mikveArray['photo_couv']['alt'] ?>">
    </section>
    <h4><i class="fas fa-tint"></i> <?php echo $mikveArray['infos']['name'] ?></h4>
    <p><i class="fas fa-map-marker-alt"></i> <?php echo $mikveArray['infos']['address'] ?></p>
    <p><i class="fas fa-phone"></i> <?php echo $mikveArray['infos']['phoneNumber'] ?></p>
    <p><i class="far fa-clock"></i> <?php echo $mikveArray['infos']['openningTimes'] ?></p>
    <section class="row">
        <i class="fas fa-box-open"></i> Equipements:
    <ul> <?php
        foreach ($mikveArray['equipements'] as $equipements)
        {
            echo "<li>".$equipements['name']." : ".$equipements['price']."</li>";
        }
    ?> </ul>
    </section>
    <!--<p> <?php
        /*foreach ($mikveArray['images'] as $images)
        {
            echo "<img src='public/images/".$images['path']."'>";
        }*/
    ?> </p>-->
    <!-- début du carroussel -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <?php foreach ($mikveArray['images'] as $key => $images)
            { ?>
                <div class="<?php if($key === 0) { echo "carousel-item active"; } else { echo "carousel-item"; }?>">
                    <img src="public/images/<?php echo $images['path'] ?>" alt="<?php echo $images['alt'] ?>" class="d-block" >
                </div>
            <?php } ?>
        </div>"
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- fin du carroussel -->
</section>
<div id="commentsOfMikves_id_<?php echo $mikveArray['infos']['id'] ?>">
    <h4>Commentaires</h4>
    <?php while ($comment = $listComments->fetch())
    { ?>
        <div class="post-answer" id="comments_id_<?php echo $comment['comments_id'] ?>">
            <p><?php echo "<img src='public/images/".$comment['profil_pic']."' class='img_user'> ".$comment['firstname']." ".$comment['lastname']."<br/>Le ".$comment['creation_date_fr']." a écrit :" ?></p>
            <hr>
            <p><?php echo $comment['comment'] ?></p>
        </div>
    <?php } ?>
</div>
<!--shalva-->


<?php $content = ob_get_clean();
require('template.php'); ?>