<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">SKY FLIGHT</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="home.php">Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="user_details.php">My reservations</a>
            </li>
        </ul>
        <div class="dropdown">
            <button class="btn btn-info dropdown-toggle" type="text" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?= $_SESSION["nom"]; ?> <?= $_SESSION["prenom"]; ?>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="left: -58px;">
                <a class="dropdown-item" href="#">Statut : <samp><?= $_SESSION["statut"]; ?></samp></a>
                <a class="dropdown-item" href="user_details.php">User</a>
                <a class="dropdown-item" href="logout.php">logout</a>
            </div>
        </div>
    </div>
    </a></li>
    </ul>
    </div>

</nav>