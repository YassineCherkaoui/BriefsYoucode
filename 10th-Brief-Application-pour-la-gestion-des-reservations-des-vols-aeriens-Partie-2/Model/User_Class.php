<?php
session_start();


 class User{

		function __construct() {
			$this->conn = new mysqli("localhost","root","","gestion_reservations");
		}

		function user_insert($nom, $prenom,$mail, $password,$statut) {	

			$query= "SELECT * FROM users WHERE email=?"; //check email if deja excest
			$stmt = $this->conn->prepare($query);
			$stmt->bind_param("s",$mail);
			$stmt->execute();
			$result= $stmt->get_result();
			$row1 = mysqli_num_rows($result);

		if ($row1 == 1) {

			echo "Sorry... Email already taken";
		}  else {
				
				$stmt =$this->conn->prepare("INSERT Into users (nom, prenom, email,password, statut) values(?,?,?,?,?)");
				$stmt->bind_param("sssss", $nom, $prenom, $mail, $password, $statut);
				$stmt->execute();
				
				header("Location: ../index.php");
			}

		

			
		}
		//User Login Page
		function user_validation($mail, $password) {  
			$query= "SELECT * FROM users WHERE email=? && password =? ";
			$stmt =$this->conn->prepare($query);
			$stmt->bind_param("ss",$mail,$password);
			$stmt->execute();
			$result= $stmt->get_result();
			$row1 = mysqli_num_rows($result);
			$row2 = $result->fetch_assoc(); //tarns to associative array

			//resultat stock in variable session
			$_SESSION["nom"] = $row2["nom"];    
			$_SESSION["prenom"] = $row2["prenom"];
			$_SESSION["statut"] =  $row2["statut"];
			//id_user for reservation
			$_SESSION["id_user"] =  $row2["id_user"];

			//Check if admin or user
			if ($row1 == 1 ) {
				if ($row2["statut"] == "Admin") {
					header("Location: ../Views/admin.php");
				} else {
					header("Location: ../views/Home.php");
				}
			}
		}
		function user_show($id) {

				$query = "SELECT * from users where id_user='$id'";
				$stmt = $this->conn->prepare($query);
				$stmt->execute();
				$result = $stmt->get_result();
				return  $result;
		}
	// Log out user
	public static function log_out()
	{
		session_destroy();
		unset($_SESSION['username']);
		return true;
	}







}










?>