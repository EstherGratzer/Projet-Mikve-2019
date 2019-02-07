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

<div class="contenair zmanim">

<div class="choiceZmanim">
    <form id="formChoiceZmanim">
        <h4>Veuillez selectionner votre ville :</h4>
        <div class="">
            <select class="chosen-select" name="city">
                <?php  foreach($cities as $city){
                    ?>
                <option data-country_code="<?php echo $city['code']?>" value="<?php echo $city['city']?>"><?php echo $city['city']?></option>
                <?php } ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary btn-block"> Consulter les zmanim pour cette vile</button>
    </form>

    <div class="hidden answerZmanim" >
        <div class="loading"><img src="public/images/giphy.gif" alt=""></div>
        <div class="zmanim-content hidden">
            <h4>Zmanim du <span class="dateToday"></span> à <span class="city"></span></h4>
            <table>
                <tr>
                    <th>Nom</th>
                    <th>Horaire</th>
                    <th>Evenement</th>
                </tr>
                <tr>
                    <td>Netz Hahchama : lever du soleil</td>
                    <td ><span class="sunsize"></span></td>
                    <td>Day Onah Starts</td>
                </tr>
                <tr>
                    <td>Shkiah : coucher du soleil</td>
                    <td ><span class="sunset"></span></td>
                    <td>Night Onah Starts</td>
                </tr>
                <tr>
                    <td>Tzish Hakohavim : tombée de la nuit </td>
                    <td ><span class="nightfall"></span></td>
                    <td>Earliest Mikvah Immersion</td>
                </tr>
            </table>
        </div>

    </div>
</div>
</div>

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




