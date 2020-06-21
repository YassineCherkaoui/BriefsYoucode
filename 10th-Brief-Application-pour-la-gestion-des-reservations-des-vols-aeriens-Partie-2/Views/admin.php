<?php
include('../model/flight_class.php');
session_start();
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
					<a class="nav-link" href="#">My Users</a>
				</li>
			</ul>
			<div class="dropdown">
				<button class="btn btn-info dropdown-toggle" type="text" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

	<div class="col-md-12 well">
		<h3 class="text-center text-info">Flight Lists</h3>
		<hr style="border-top:1px dotted #ccc;" />
		<button type="button" class="btn btn-info" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> ADD Flight</button>
		<br /><br />
		<table class="table table-hover table-dark">
			<thead>
				<tr>
					<th>Departure date</th>
					<th>Departure city</th>
					<th>Arrival city</th>
					<th>Number of places</th>
					<th>Price</th>
					<th>Flight status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				require '../Model/dbconnection.php';
				$query = mysqli_query($conn, "SELECT * FROM `vols`");
				while ($fetch = mysqli_fetch_array($query)) {
				?>
					<tr>
						<td><?php echo $fetch['date_depart'] ?></td>
						<td><?php echo $fetch['depart'] ?></td>
						<td><?php echo $fetch['destination'] ?></td>
						<td><?php echo $fetch['num_place'] ?></td>
						<td><?php echo $fetch['prix'] ?></td>
						<td><?php echo $fetch['statut'] ?></td>
						<td><button type="button" data-toggle="modal" class="btn btn-info" data-target="#update_modal<?php echo $fetch['id'] ?>"><i class=" fas fa-edit"></i></button></td>
					</tr>
				<?php

					include 'Flight_update.php';
				}
				?>
			</tbody>
		</table>
	</div>
	<div class="modal fade" id="form_modal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="../Controller/Backend_Admin.php">
					<div class="modal-header">
						<h3 class="modal-titler">Add flights</h3>
					</div>
					<div class="modal-body">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="form-group">
								<label>Departure date:</label>
								<input type="datetime-local" class="form-control" id="recipient-name" required="required" name="date_depart">
							</div>
							<div class="form-group">
								<label>Departure city:</label>
								<input type="text" class="form-control" id="recipient-name" required="required" name="vdepart">
							</div>
							<div class="form-group">
								<label>Arrival city:</label>
								<input type="text" class="form-control" id="recipient-name" required="required" name="varrivee">
							</div>
							<div class="form-group">
								<label>Number of places:</label>
								<input type="number" class="form-control" id="recipient-name" required="required" name="npalace">
							</div>
							<div class="form-group">
								<label>Price:</label>
								<input type="number" name="prix" class="form-control" required="required" />
							</div>
							<div class="form-group">
								<label>Flight status:</label>
								<select name="statut" id="cars" class="form-control" id="recipient-name" required="required">
									<option value="Valide">Valide</option>
									<option value="Canceled">Canceled</option>
								</select>
							</div>
						</div>
					</div>
					<div style="clear:both;"></div>
					<div class="modal-footer">
						<button name="addFlight" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span>Save</button>
						<button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
					</div>
			</div>
			</form>
		</div>
	</div>
	</div>












	</div>



	<?php
	include('footer.php');
	?>
</body>

</html>