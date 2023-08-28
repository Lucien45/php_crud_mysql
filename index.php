<?php include("db.php") ?>

<?php include("includes/header.php") ?>
	<script type="text/javascript" src="bootstrap-4.3.1/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="Datatable/datatables.js"></script>
	<link rel="stylesheet" type="text/css" href="Datatable/datatables.css">
	<div class="container p-4">
		<div class="row">
			<div class="col-md-4">

				<?php if (isset($_SESSION['message'])) { ?>
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
						<?= $_SESSION['message'] ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php session_unset();} ?>

				<div class="card-card-body">
					<form action="save.php" method="POST">
						<div class="form-group">
							<input type="text" name="title" class="form-control" placeholder="Task Title" autofocus>
						</div>
						<div class="form-group">
							<textarea name="description" rows="2" class="form-control" placeholder="Task Description"></textarea>
						</div>
						<input type="submit" type="btn btn-success " style="padding: 10px 24px; background-color: #4CAF50; border-radius: 8px; border: 2px solid #4CAF50;" name="save_task" value="Save">
					</form>
				</div>
			</div>
			<div class="col-md-8">
				<table class="table table-bordered" id="#tab">
					<thead>
						<tr>
							<th>Title</th>
							<th>Desccription</th>
							<th>Created at</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$query = "SELECT * FROM task";
						$result_tasks = $conn->prepare($query);
						$result_tasks->execute();

						while ($row = $result_tasks->fetch(PDO::FETCH_ASSOC)) { ?>
							<tr>
								<td><?php echo $row['title'] ?></td>
								<td><?php echo $row['description'] ?></td>
								<td><?php echo $row['created_at'] ?></td>
								<td>
									<a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary">
										<i class="fas fa-marker">Edit</i>
									</a>
									<a href="delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">
										<i class="far fa-trash-alt">Delete</i>
									</a>
									<a href="voir.php?id=<?php echo $row['id'] ?>" class="btn btn-info">
										<i class="fas fa-marker">Voir</i>
									</a>
								</td>
							</tr>

						<?php } ?>
					</tbody>
				</table>
			</div>

		</div>
	</div>
	<script>
		$(document).ready(function(){
			$("#tab").DataTable();
		});
	</script>
<?php include("includes/footer.php") ?>