<?php 
	include("Task.php");

	$task = new Task();
	$insert = $task->insert();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
	<link rel="stylesheet" href="bootstrap-4.3.1/css/bootstrap.min.css">
	<title>PHP MYSQL CRUD POO MODAL</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiprqD80Kn4Z8NTSRyMA2Fd33n5dQ81WUE00s" crossorigin="anonymos">
	<script type="text/javascript" src="bootstrap-4.3.1/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="Datatable/datatables.js"></script>
	<link rel="stylesheet" type="text/css" href="Datatable/datatables.css">
</head>
<nav class="navbar navbar-dark bg-dark">
	<div class="container">
		<a href="index.php" class="navbar-brand">PHP MYSQL CRUD POO MODAL</a>
		<a href="../index.php">LITE</a>
	</div>
</nav>