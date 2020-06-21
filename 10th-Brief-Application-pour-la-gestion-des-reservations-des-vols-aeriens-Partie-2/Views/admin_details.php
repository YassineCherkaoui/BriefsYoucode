<?php
include('../model/User_Class.php');			
?>
<!DOCTYPE html>
<html lang="en">
<?php
include('header.php');
?>
<body class="background">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">SKY FLIGHT</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="admin.php">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="admin_details.php">My Users</a>
                </li>
            </ul>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="text" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?= $_SESSION["nom"]; ?> <?= $_SESSION["prenom"]; ?>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="left: -58px;">
                    <a class="dropdown-item" href="#">Statut : <samp><?= $_SESSION["statut"]; ?></samp></a>
                    <a class="dropdown-item" href="admin_details.php">User</a>
                    <a class="dropdown-item" href="logout.php">logout</a>
                </div>
            </div>
        </div>
        </a></li>
        </ul>
        </div>

    </nav>
    <?php
    $id = $_SESSION["id_user"];
    $user = new User();
    $res = $user->user_show($id);
    $row = $res->fetch_assoc();
    ?>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="blink"></div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Profile</h4>
                                <img src="../Public/img/user_profile.png" width="15%">
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <form method="POST" action="../controller/Backend_Admin.php">
                                    <div class="form-group row">
                                        <label for="username" class="col-4 col-form-label">
                                            First Name</label>
                                        <div class="col-8">
                                            <input name="id" value="<?= $row['id_user']; ?>" type="hidden">

                                            <input id="username" name="nom" value="<?= $row['nom']; ?>" class="form-control here" required="required" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-4 col-form-label">Last Name</label>
                                        <div class="col-8">
                                            <input id="name" name="prenom" value="<?= $row['prenom']; ?>" class="form-control here" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lastname" class="col-4 col-form-label">EMAIL</label>
                                        <div class="col-8">
                                            <input id="lastname" name="mail" value="<?= $row['email']; ?>" class="form-control here" type="email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="text" class="col-4 col-form-label">PASSWORD</label>
                                        <div class="col-8">
                                            <input id="text" name="password" value="<?= $row['password']; ?>" class="form-control here" required="required" type="password">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include('Footer.php');
    ?>
</body>

</html>