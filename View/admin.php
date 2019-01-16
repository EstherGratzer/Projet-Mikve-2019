<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Admin</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="public/css/style.css" rel="stylesheet" />
    </head>
    <body id="LoginForm">
        <div class="container">
            <?php if(!$showLoginForm)
            { ?>
                <div>
                    <h2>Bienvenue sur l'Admin du site Mikve.com</h2>
                </div>
            <?php }
            else
            { ?>
                <div class="form">
                    <form id="form-connect-admin" action="admin.php?action=login" method="POST">
                        <h2>Formulaire de Connexion</h2>
                        <div class="form-group">
                            <input type="text" class="form-control" id="Login" name="Login" placeholder="Login">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="Password" name="Password" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary" name="connection" id="connection">Login</button>
                    </form>
                </div>
            <?php } ?>
            <br>
            <br>
            <br>
        </div>
        <footer class="center"></footer>
    </body>
</html>