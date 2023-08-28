<?php
	include 'Task.php';
	$task = new Task();
	$id = $_REQUEST['id'];
	$delete = $task->delete($id);

	if ($delete) {
		$_SESSION['message'] = 'Task removed succesfully';
		$_SESSION['message_type'] = 'danger';
		header("Location: index.php");
	}
?>