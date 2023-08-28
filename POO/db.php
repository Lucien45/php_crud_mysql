<?php
	session_start();
	class Database
	{
		private static $conn;

		public function __construct(){}
		public static function getConn(){
			try{
				self::$conn = new PDO('mysql:host=localhost; dbname=php_mysql_crud','root','');
			 	self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
	 			self::$conn->query("SET NAMES UTF8");
	 		}
	 		catch (PDOException $e){
	 			die($e->getMessage());
	 		}
	 		return self::$conn;
		}
	}
?>