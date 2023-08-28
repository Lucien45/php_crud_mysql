<?php
	include 'db.php'; 
	if (isset($_GET['id'])) {
		# code...
		$id = $_GET['id'];
		$query = "DELETE FROM task WHERE id = $id";
		$result = $conn->prepare($query);
		$result->execute();
		if (!$result) {
			# code...
			die("Query Failed");
		}

		$_SESSION['message'] = 'Task removed succesfully';
		$_SESSION['message_type'] = 'danger';
		header("Location: index.php");
	}
 ?>