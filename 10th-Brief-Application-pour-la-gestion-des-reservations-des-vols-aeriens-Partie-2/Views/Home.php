<?php
include('../Model/dbconnection.php');
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
	<form class="text-center border border-light p-5" method="post" action="recherche.php">
		<!-- Name -->
		<label for="exampleInputEmail1">Departure city</label>
		<input type="text" name="villedepart" class="form-control mb-4">

		<!-- Email -->
		<label for="exampleInputPassword1">Arrival city</label>
		<input type="text" name="villearrivee" class="form-control mb-4">

		<!-- Sign in button -->
		<button class="btn btn-info btn-block" type="submit" name="submit-search">Search flights</button>


	</form>

	 



	</section>
	</div>
	<?php
	include('Footer.php');
	?>



</body>

</html>