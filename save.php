<?php
include("db.php");

if (isset($_POST['save_task'])) {
 	# code...
 	$title = $_POST['title'];
 	$description = $_POST['description'];
 	// echo $title;
 	// echo $description;

 	$query = "INSERT INTO task(title, description) VALUES ('$title', '$description')";
 	$result = $conn->prepare($query);
 	$result->execute();
 	if (!$result) {
 		# code...
 		die("Query Failed");
 	}
 	// echo "Saving";

 	$_SESSION['message'] = 'Task saved succesful';
 	$_SESSION['message_type'] = 'success';

 	header("Location: index.php");
 } 
 ?>