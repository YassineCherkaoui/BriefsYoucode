<?php
include('../Model/dbconnection.php');
session_start();
?>
<html lang="en">

<?php
include('header.php');
?>

<body class="background">
	<?php
	include('navbar.php');
	?>




	<hr>
	<?php
	$id = $_GET['id'];
	$query = "SELECT * FROM vols WHERE id=?";
	$stmt = $conn->prepare($query);
	$stmt->bind_param("i", $id);
	$stmt->execute();
	$result = $stmt->get_result();
	$row = $result->fetch_assoc();
	?>
	<div class="container">
		<table class="table table-dark table-hover">
			<thead>
				<tr>
					<th>Departure</th>
					<th>Destination</th>
					<th>Departure date</th>
					<th>Number of places</th>
					<th>Price</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?= $row['depart']; ?></td>
					<td><?= $row['destination']; ?></td>
					<td><?= $row['date_depart']; ?></td>
					<td><?= $row['num_place'];; ?></td>
					<td><?= $row['prix']; ?>DH</td>
				</tr>

			</tbody>
		</table>
		<a href="index.php" class="btn btn-primary">Cancel flight</a>
	</div>

	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="col-md-7 col-md-offset-1">
						<div class="booking-form">
							<form action="../controller/Backend_reservation.php" method="POST">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Last Name</span>
											<input class="form-control" name="nom" type="text" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">First Name</span>
											<input class="form-control" name="prenom" type="text" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Age</span>
											<input class="form-control" name="age" type="number" required>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Country </span>
											<input class="form-control" name="pays" type="text" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Address </span>
											<input class="form-control" name="adresse" type="text" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Phone number </span>
											<input class="form-control" name="tele" type="number" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Email </span>
											<input class="form-control" name="email" type="email" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Passport number </span>
											<input class="form-control" name="passeport" type="number" required>
										</div>
									</div>
									<input type="hidden" id="custId" name="id" value="<?= $id; ?>">
								</div>
								<div class="form-btn">



									<button type="submit" name="add_passager" class="submit-btn">
										Full booking</a>
									</button>
								</div>
							</form>
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