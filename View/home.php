<?php
$style = '<link rel="stylesheet" href="public/css/home.css">' ;
$title= "Home Page";
ob_start();
?>
<div class="container slide">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="2000">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="public/images/image-mikve1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="public/images/image-source.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="public/images/image-calendar.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<script>$('.carousel').carousel({
        interval: 5000
    })
</script>

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

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>




