<?php include("includes/header.php") ?>
    <div class="row">
        <div class="col-md-8 max-auto">
          <?php
            include 'Task.php';
            $task = new Task();
            $id = $_REQUEST['id'];
            $row = $task->voir($id);
            if (!empty($row)) {

              ?>
              <div class="card">
                <div class="card-header">
                  Single Record
                </div>
                <div class="card-body">
                  <p>N° = <?php echo $row['id']; ?></p>
                  <p>Titre = <?php echo $row['title']; ?></p>
                  <p>description = <?php echo $row['description']; ?></p>
                  <p>Date de creation = <?php echo $row['created_at']; ?></p>
                </div>
              </div>
              <?php
            }else{
              echo "no data";
            }
          ?>
        </div>
      </div>
    </div>
    <a href="index.php" class="btn btn-danger">
		<i class="far fa-trash-alt">Retour</i>
	</a> 
<?php include("includes/footer.php") ?>