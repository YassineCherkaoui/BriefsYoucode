<?php
include('../Model/flight_class.php');
session_start();
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


	<div class="container text-center">
		<form method="post" action="recherche">
			<h1>Search results</h1>


	</div>

	<div id="booking" class="container">
		<div class="row">
			<div class="col-12">
				<?php
				$villedepart = $_POST['villedepart'];
				$villearrivee = $_POST['villearrivee'];

				$vol = new Vol();
				$res = $vol->flight_show($villedepart, $villearrivee);

				?>
				<tr>
					<?php
					$row_cnt = $res->num_rows;
					if ($row_cnt <= 0)
						echo " No result found";
					else {
						echo "<table class='table table-bordered'>
					<thead>
						<tr>
							<th scope='col'>Departure date</th>
							<th scope='col'>Departure city</th>
							<th scope='col'>Arrival city</th>
							<th scope='col'>Number of places</th>
							<th scope='col'>Booking</th>
						</tr>
					</thead>
					<tbody>";
						while
						($row = $res->fetch_assoc()) { ?>
							<td><?= $row['date_depart']; ?></td>
							<td><?= $row['depart']; ?></td>
							<td><?= $row['destination']; ?></td>
							<td><?= $row['num_place']; ?></td>
							<td>
								<a class="btn btn-success" href="reservation.php?id=<?= $row['id']; ?>" type="button">Reserve</i></a>
							</td>
				</tr>
		<?php }
					} ?>

		</tbody>
		</table>
			</div>
		</div>
	</div>
	<?php
	include('footer.php');
	?>
</body>

</html>