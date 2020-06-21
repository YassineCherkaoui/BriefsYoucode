<?php
include('../Model/User_Class.php');
include('../model/reservation_class.php');
?>
<!DOCTYPE html>
<html lang="en">

<?php
//Header included
include('header.php');
?>

<body class="background">
	<?php
	//Header included
	include('navbar.php');
	?>
	<?php
	$id = $_SESSION["id_user"];
	$user = new User();
	$res = $user->user_show($id);
	$row = $res->fetch_assoc();
	?>
	<div>
		<hr>
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<div class="blink"></div>
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-4 col-md-12">
									<h4>Profile</h4>
									<img src="../Public/img/user_profile.png" width="15%">
									<hr>
								</div>
							</div>
							<div class="row">
								<div class="col-4 col-md-12">
									<form method="POST" action="../controller/Backend_User.php">
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
	</div>

	<hr>

	<!-- display data reservation -->
	<div class="container">
		<div id="historical">
			<h1 class="text-center" style="color: Black;">Ordered</h1>

			<table class="table table-bordered table-hover col-4 col-md-12" class="">
				<thead>
					<tr class="text-center" style="color: black;">
						<th scope="col">Reservation date</th>
						<th scope="col">More Details</th>

					</tr>
				</thead>
				<?php
				$id_user = $_SESSION["id_user"];
				$info = new Reservation();
				$res = $info->reservation_join($id_user);
				?>
				<tbody>

					<tr>
						<?php while ($row = $res->fetch_assoc()) { ?>
							<td class="text-center"><?= $row['date_reservation']; ?></td>
							<td class="text-center">
								<input type="button" name="view" value="MORE" id="<?= $row['id']; ?>" class="btn btn-info btn-xs view_data">
							</td>
					</tr>
				<?php } ?>

				</tbody>
			</table>

		</div>

		<div>


		</div>


	</div>
	<!-- display data -->
	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalCenterTitle">More details</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" id="detail">

					...................................
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<?php
	include('Footer.php');
	?>
	<?php
	include('script.php');
	?>


</body>

</html>