<li class="dropdown">
    <?php if (!isset($_SESSION['user'])) { ?>
        <a href="signIn.php">Inscription</a>
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Connexion</a>
        <form id="form-login" class="form-login" name="form-login" method="POST" >
            <ul class="dropdown-menu">
                <li>
                    <div class="navbar-login">
                        <div class="row">
                            <div class="col-lg-12">
                                <a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login via facebook</a>
                                <p class="divider-text">
                                    <span class="bg-light">Ou</span>
                                </p><p class="text-left"><strong>Renseigner vos informations</strong></p>
                                <div class="alert-danger hidden"></div><br>
                                <div class="form-group">
                                    <input id = "login" name="login" class="form-control" placeholder="Login" type="email">
                                    <input id="password" name="password" class="form-control" placeholder="Password" type="password">
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
                                <input  type="submit" class="btn btn-success" value="Connexion"/>
                                <p class="text-center">Pas encore inscrit ? <a href="signIn.php">Creer un compte</a> </p>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </form>
    <?php }
    else { ?>
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <?php if (isset($_SESSION['user']['media_id'])) { ?>
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