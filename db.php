<?php
	session_start();
	try{
        $conn = new PDO('mysql:host=localhost;dbname=php_mysql_crud;charset=utf8;', 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(Exception $e){
        die('Une erreur a été trouvée : '. $e->getMessage());
    }

 ?>