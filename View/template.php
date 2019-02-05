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
        <?php echo $style ?>
        <title> <?php echo $title ?> </title>
    </head>
    <body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Mikve</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Liste des mikvés</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Halkha du jour</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Boutique</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <?php if (!isset($_SESSION['user'])) { ?>
                        <a href="signIn.php">Inscription</a>
                        <?php } ?>

                        <?php if (!isset($_SESSION['user'])) { ?>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Connexion</a>
                        <form action="signIn.php?action=doLogin" method="post" name="form-login">
                        <ul class="dropdown-menu">
                            <li>
                                <div class="navbar-login">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p class="text-left"><strong>Veuillez renseigner votre login et password</strong></p>
                                            <div class="form-group">
                                                <input name="login" class="form-control" placeholder="Login" type="email">
                                                <input name="password" class="form-control" placeholder="Password" type="password">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="navbar-login navbar-login-session">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <a href="#" class="btn btn-danger btn-block btn-login">Connexion</a>
                                            <p class="text-center">Pas encore inscrit <a href="signIn.php">Creer un compte</a> </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        </form>
                        <?php }
                        else { ?>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <?php if (isset($_SESSION['user']['profils_id'])) { ?>
                            <img class="inset" src="public/images/users/<?php echo $_SESSION['user']['path']?>" alt="<?php echo $_SESSION['user']['alt']?>">
                            <?php }
                            else { ?>
                            <img class="inset" src="public/images/users/defaultAvatar.jpg" alt="<?php echo $_SESSION['user']['lastname']?>">
                            <?php } ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="navbar-login">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p><strong><?php echo $_SESSION['user']['firstname'].' '.$_SESSION['user']['lastname']?></strong></p>
                                            <?php if ($_SESSION['user']['rights_id'] == 1) {?>
                                            <p><a href="admin.php" target="_blank">Administration</a></p>
                                            <?php }?>
                                            <p><a href="#">Mon compte</a></p>
                                            <p><a href="signIn.php?action=logOut">Deconnexion</a></p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <?php } ?>

                    </li>
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