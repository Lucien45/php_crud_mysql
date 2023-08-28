<?php
$conn = mysqli_connect(
		'localhost',
		'root',
		'',
		'php_mysql_crud'
	);
if (isset($_GET['id'])) {
	 	# code...
	 	$id = $_GET['id'];
	 	$query = "SELECT * FROM task WHERE id = $id";
	 	$result = mysqli_query($conn, $query);
	 	if (mysqli_num_rows($result) == 1) {
	 		$row = mysqli_fetch_array($result);
	 		$title = $row['title'];
	 		$description = $row['description'];
	 		// echo $title;
	 	}
	 }  
 ?>
 <?php include("includes/header.php") ?>
    <div class="row">
        <div class="col-md-8 max-auto">
              <div class="card">
                <div class="card-header">
                  Single Record
                </div>
                <div class="card-body">
                  <p>N° = <?php echo $row['id']; ?></p>
                  <p>Titre = <?php echo $title; ?></p>
                  <p>description = <?php echo $description; ?></p>
                  <p>Date de creation = <?php echo $row['created_at']; ?></p>
                </div>
              </div>
        </div>
      </div>
    </div>
    <a href="index.php" class="btn btn-danger">
		<i class="far fa-trash-alt">Retour</i>
	</a> 
<?php include("includes/footer.php") ?>