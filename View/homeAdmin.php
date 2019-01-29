<header>
    <div class="navbar navbar-light" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Mikve Admin</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="#" data-action="listMikves">Gestion Mikve</a></li>
                <li><a href="#" data-action="listUsers">Gestion Utilisateurs</a></li>
                <li><a href="#" data-action="listHalahotes">Gestion Halah'ot</a></li>
            </ul>
        </div>
    </div>
</header>
<div class="container admin home">
    <div>
        <h2>Bienvenue <?php echo $_SESSION['user']['firstname'] ?></h2>
    </div>
    <div class="listContent hidden"></div>
</div>