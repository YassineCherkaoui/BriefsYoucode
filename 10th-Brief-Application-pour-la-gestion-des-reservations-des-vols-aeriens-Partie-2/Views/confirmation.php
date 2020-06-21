<?php
include '../Controller/backend_confirmation.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php
include('header.php');
?>

<body class="background">
    <?php
    include('navbar.php');
    ?>
    <hr>
    <div class="container">
        <table class="table table-striped table-hover table-dark">
            <tbody>
                <tr>
                    <th>Ticket N°</th>
                    <td><?= $row2['id']; ?></td>
                </tr>
                <tr>
                    <th>Last name :</th>
                    <td><?= $row2['nom']; ?></td>
                </tr>
                <tr>
                    <th>First name</th>
                    <td><?= $row2['prenom'] ?></td>
                </tr>
                <tr>
                    <th>Age</th>
                    <td><?= $row2['age']; ?></td>
                </tr>
                <tr>
                    <th>Country</th>
                    <td><?= $row2['pays'] ?></td>
                </tr>
                <tr>
                    <th>Departure</th>
                    <td><?= $row1['depart']; ?></td>
                </tr>
                <tr>
                    <th>Destination</th>
                    <td><?= $row1['destination'] ?></td>
                </tr>
                <tr>
                    <th>Departure Date</th>
                    <td><?= $row1['date_depart']; ?></td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td><?= $row1['prix'] ?></td>
                </tr>
            </tbody>
        </table>
        <button type=" button" class="btn bg-light p-2 rounded text-center text-dark" data-toggle="modal" data-target="#exampleModal">
            Confirm
            </button>

            <!-- Modal confirmation -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="button" class="btn btn-danger"><a href="Home.php">Confirm</a></button>
                        </div>
                    </div>
                </div>
            </div>

    </div>



    <div class="blink" style="margin-top: 200px;"></div>




    <?php
    include('Footer.php');
    ?>
</body>

</html>