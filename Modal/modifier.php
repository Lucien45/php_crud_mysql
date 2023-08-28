<?php include 'includes/header.php'; ?>
<?php
	include 'Task.php';
	$task = new Task();
    $id = $_REQUEST['id'];
    $row = $task->edit($id);
     if (isset($_POST['update'])) {
        if (isset($_POST['title']) && isset($_POST['description'])) {
            if (!empty($_POST['title']) && !empty($_POST['description'])) {

            	$data['id'] = $id;
                $data['title'] = $_POST['title'];
                $data['description'] = $_POST['description'];

                $update = $task->update($data);
                if($update){
                    $_SESSION['message'] = "task update successfully";
	 				$_SESSION['message_type'] = "warning";
                    header("location:index.php");
                }else{
                	$_SESSION['message'] = "Error";
	 				$_SESSION['message_type'] = "info";
                    header("location:index.php");
                }

            }else{
            	$_SESSION['message'] = "warning";
	 			$_SESSION['message_type'] = "warning";
                header('location: modifier.php?id=$id');
            }
        }
	}
?>
<div class="container p-4">
	<div class="row">
		<div class="col-md-4 max-auto">
			<div class="card card-body">
				<form action="" method="POST">
					<div class="form-group">
						<input type="test" name="title" value="<?php echo $row['title']; ?>" class="form-control" placeholder="Update Title">
					</div>
					<div class="form-group">
						<textarea name="description" rows="2" class="form-control" placeholder="Update Description"><?php echo $row['description']; ?></textarea>
					</div>
					<div>
						<button class=" btn btn-success" name="update">
							Update
						</button>
						<a href="index.php" class="btn btn-danger">
							<i class="far fa-trash-alt">Retour</i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

 <?php include 'includes/footer.php'; ?>