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
                <li><a href="#" data-action="listEquipements">Gestion Equipements</a></li>
            </ul>
        </div>
    </div>
</header>
<div class="container admin home">
    <div>
        <h2>Bienvenue <?php echo $_SESSION['user']['firstname'] ?></h2>
    </div>
    <!-- Trigger the modal with a button -->
    <!--button type="button" class="btn btn-info btn-lg">Open Modal</button-->

    <!-- Modal : permet d'afficher une boite de dialog avec ce qu'on veut dedans, par defaut ce div est en mode hidden-->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
            </div>
        </div>
    </div>
    <div class="listContent hidden"></div>
</div>