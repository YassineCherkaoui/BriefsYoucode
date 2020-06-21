<?php
include('../Model/User_Class.php');

//SignUp
if(isset($_POST['signIn'])){
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$mail = $_POST['mail'];
    $password = $_POST['password'];
	$statut = "User"; //default insert User
	$user = new User();
	$user->user_insert($nom, $prenom, $mail, $password,$statut);//call from user class inser auto
}
//SignIn
if(isset($_POST['Login'])){
	$mail = $_POST['mail'];
	$password = $_POST['password'];
	$user = new User();
	$user->user_validation($mail, $password);
}
?>