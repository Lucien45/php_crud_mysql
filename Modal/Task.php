<?php
	include 'db.php';
	class Task{
		private $id;
		private $title;
		private $description;
		private $date_creation;
		private $connexion;

		public function __construct(){
			$this->id = 0;
			$this->title = "";
			$this->description = "";
			$this->date_creation = "";
			$this->connexion = Database::getConn();
		}
		public function setId($id){
        $this->id = $id;
	    }
	    public function setTitle($title){
	        $this->title = $title;
	    }
	    public function setDescription($description){
	        $this->description = $description;
	    }
	    public function setConnexion($connexion){
        $this->connexion = $connexion;
    	}
    	public function getId(){
        	return $this->id;
	    }
	    public function getTitle(){
	        return $this->title;
	    }
	    public function getDescription(){
	        return $this->description;
	    }
	    public function getConnexion(){
	        return $this->connexion;
	    }

	    public function select(){
	        $requete = $this->connexion->prepare("SELECT * FROM task");
	        $requete->execute();
	        while($row = $requete->fetch(PDO::FETCH_ASSOC)){
	            ?>
	                <tr>
	                    <td><?php echo $row['id'] ?></td>
	                    <td><?php echo $row['title'] ?></td>
	                    <td><?php echo $row['description'] ?></td>
	                    <td><?php echo $row['created_at'] ?></td>
	                    <td>
	                        <a href="modifier.php?id=<?php echo $row['id'] ?>" class="btn btn-warning">
								<i class="fas fa-marker">Edit</i>
							</a>
							<a href="supprimer.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">
								<i class="far fa-trash-alt">Delete</i>
							</a>
							<a href="voir.php?id=<?php echo $row['id'] ?>" class="btn btn-info">
								<i class="far fa-trash-alt">Info</i>
							</a>
	                    </td>
	                </tr>
	            <?php
	        }
    	}

    	public function insert(){
    		if (isset($_POST['sauvegarder'])) {
			 	$title = $_POST['title'];
			 	$description = $_POST['description'];
			 	try{
					$requete = $this->connexion->prepare("INSERT INTO task (title, description) VALUES (:title, :description)");
					$requete->execute(['title'=>$title, 'description'=>$description]);

					$_SESSION['message'] = 'Insertion reussie';
					$_SESSION['message_type'] = 'success';
					header("Location: index.php");

				}catch(PDOException $e){
					$_SESSION['error'] = $e->getMessage();
					header("Location: index.php");
				}
			}
    	}

    	public function voir($id){
    		$requete = $this->connexion->prepare("SELECT * FROM task where id = '$id' ");
	        $requete->execute();
	        while($row = $requete->fetch(PDO::FETCH_ASSOC)){
	        	$data = $row;
	        }
	        return $data;
    	}

    	public function edit($id){
    		$data = null;
    		$requete = $this->connexion->prepare("SELECT * FROM task where id = '$id' ");
	        $requete->execute();
	        while($row = $requete->fetch(PDO::FETCH_ASSOC)){
	        	$data = $row;
	        }
	        return $data;
    	}

    	public function update($data){
    		$requete = $this->connexion->prepare("UPDATE task set title = '$data[title]', description = '$data[description]' WHERE id='$data[id]' ");
    		$requete->execute();
    		if ($requete) {
				return true;
			}else{
				return false;
			}
    	}

    	public function delete($id){
    		$requete = $this->connexion->prepare("DELETE FROM task where id = '$id'");
	        $requete->execute();
	        if ($requete) {
				return true;
			}else{
				return false;
			}
    	}
	}
?>