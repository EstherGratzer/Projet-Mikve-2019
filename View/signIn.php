<?php
$title = 'SignIn Page';
$style = '<link rel="stylesheet" href="public/css/signIn.css">';
ob_start();
?>
<div class="container">
    <div class="card bg-light">
        <article class="card-body mx-auto" style="max-width: 400px;">
            <h4 class="card-title mt-3 text-center">Create Account</h4>
            <p>
                <!--<a href="" class="btn btn-block btn-google"> <i class="fab fa-google"></i>   Login via Google</a>-->
                <a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login via facebook</a>
            </p>
            <p class="divider-text">
                <span class="bg-light">OR</span>
            </p>
            <?php
            if ($errors) {
                ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors as $error){ ?>
                    <li><span><?php echo $error; ?></span></li>
                    <?php }  ?>
                </ul>
            </div>
            <?php
            }
            ?>

            <form action="signIn.php?action=signUp" method="post" enctype="multipart/form-data">
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input name="firstname" class="form-control" placeholder="Firstname" type="text" value="<?php echo $firstname?>">
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input name="lastname" class="form-control" placeholder="Lastname" type="text" value="<?php echo $lastname?>">
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                    </div>
                    <input name="login" class="form-control" placeholder="Email address" type="email" value="<?php echo $login?>">
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input name="password" class="form-control" placeholder="Create password" type="password">
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input class="form-control" placeholder="Repeat password" type="password">
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fas fa-user-circle"></i> </span>
                    </div>
                    <input class="form-control" name="profils_id" type="file">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"> Create Account  </button>
                </div>
                <div class="form-group">
                    <p class="text-center">Deja inscrit ? <a href="index.php">Retour à l'accueil</a> </p>
                </div>
            </form>
        </article>
    </div>
</div>
<?php $content = ob_get_clean();
require('template.php'); ?>


