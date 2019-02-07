<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="public/css/template.css">
        <script src="public/js/script.js"></script>
        <script src="public/js/signIn.js"></script>
        <script src="public/js/zmanim.js"></script>
        <script src="dist/jquery.emojiRatings.min.js"></script>
        <script src="public/js/mikve.js" type="application/javascript"></script>
        <?php echo $style ?>
        <title> <?php echo $title ?> </title>
    </head>
    <body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php"><img class="logo-img" src="public/images/logo.jpg" alt="logo mikve"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="mikve.php">Liste des mikvés</a></li>
                    <li class="nav-item"><a class="nav-link" href="halaha.php">Halkha du jour</a></li>
                    <li class="nav-item"><a class="nav-link" href="View/shop.php">Boutique</a></li>
                    <li class="nav-item"><a class="nav-link" href="View/contact.php">Contact</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right nav-connection">
                    <?php require ("View/navigationConnection.php"); ?>
                </ul>
            </div>
        </nav>

    </header>
    <section>
        <?php echo $content ?>
    </section>

    <footer>

    <p class="text-center"> Copyright © Projet Mikvé 2019 - DI Jerusalem - Torah Tech Institute. All right reserved. </p>

    </footer>
    </body>
</html>