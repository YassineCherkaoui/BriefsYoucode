<!-- Modal update flight -->
<div class="modal fade" id="update_modal<?php echo $fetch['id'] ?>" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="../controller/Backend_Admin.php">
				<div class="modal-header">
					<h3 class="modal-title">Update User</h3>
				</div>
				<div class="modal-body">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="form-group">
							<input type="hidden" name="id" value="<?php echo $fetch['id'] ?>" />
						</div>

						<div class=" form-group">
							<label>Flight status:</label>
							<select name="statut" id="cars" class="form-control" id="recipient-name" required="required">
								<option value="<?php echo $fetch['statut'] ?>" selected><?php echo $fetch['statut'] ?></option>
								<option value="Valide">Valide</option>
								<option value="Canceled">Canceled</option>
							</select>

						</div>

					</div>
				</div>
				<div style=" clear:both;"></div>
				<div class="modal-footer">
					<button name="update-fight" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span>
						Update</button>
					<button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
				</div>
		</div>
		</form>
	</div>
</div>
</div>