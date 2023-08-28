<?php 
	include("Task.php");

	$task = new Task();
	$insert = $task->insert();
?>

<?php include("includes/header.php") ?>
	<script type="text/javascript" src="bootstrap-4.3.1/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="Datatable/datatables.js"></script>
	<link rel="stylesheet" type="text/css" href="Datatable/datatables.css">
	<div class="container p-4">
		<div class="row">
			<div class="col-md-3">

				<?php if (isset($_SESSION['message'])) { ?>
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
						<?= $_SESSION['message'] ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php session_unset();} ?>

				<div class="card-card-body">
					<form action="" method="POST">
						<div class="form-group">
							<input type="text" name="title" class="form-control" placeholder="Le titre" autofocus>
						</div>
						<div class="form-group">
							<textarea name="description" rows="2" class="form-control" placeholder="La Description"></textarea>
						</div>
						<input type="submit" type="btn btn-primary btn-flat " style="padding: 10px 24px; background-color: #4CAF50; border-radius: 8px; border: 2px solid #4CAF50;" name="sauvegarder" value="Save">
					</form>
				</div>
			</div>
			<div class="col-md-9">
				<table class="table table-bordered" id="task">
					<thead>
						<tr>
							<th>#</th>
							<th>Title</th>
							<th>Desccription</th>
							<th>Created at</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$task->select();
						?>
					</tbody>
				</table>
			</div>

		</div>
	</div>
	<script>
		$(document).ready(function(){
			$("#task").DataTable();
		});
	</script>
<?php include("includes/footer.php") ?>