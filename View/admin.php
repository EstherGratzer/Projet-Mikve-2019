<?php
$title = 'Admin'; //on définit le contenu de title pour le mettre dans template.php
ob_start(); //on définit le contenu de content pour le mettre dans template.php
if(!$showLoginForm)
{
    require ('View/homeAdmin.php');
}
else
{ ?>
    <div class="container admin login">
        <div class="alert alert-danger hidden" role="alert"></div>
        <div class="form">
            <form id="form-connect-admin" action="admin.php?action=login" method="POST">
                <h2>Formulaire de Connexion</h2>
                <div class="form-group">
                    <input type="text" class="form-control" id="Login" name="Login" placeholder="Login">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="Password" name="Password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary" name="connection" id="connection">Login</button>
            </form>
        </div>
    </div>
<?php } ?>
<footer class="center"></footer>
<!--container end.//-->
<?php $content = ob_get_clean(); ?>
<?php require('templateAdmin.php'); ?>