<?php

session_start();

require ("conf.inc.php");
require ("functions.php");



if( count($_POST) == 5
	&& !empty($_POST['lastname'])
	&& !empty($_POST['firstname'])
	&& !empty($_POST['email']) 
	&& !empty($_POST['pwd']) 
	&& !empty($_POST['pwdConfirm']) ){ 


$lastname = trim(ucfirst(strtolower($_POST['lastname'])));
$firstname = trim(ucfirst(strtolower($_POST['firstname'])));
$email = trim(strtolower($_POST['email']));
$pwd = $_POST['pwd'];
$pwdConfirm = $_POST['pwdConfirm'];


$listOfErrors = [];
$error = false;

//Verification du nom
if (!preg_match("#[a-zA-Z]+#", $lastname) || strlen($lastname) > 80 || strlen($lastname) < 2){
	$listOfErrors[] = 1;
	$error = true;
}
//Verification du prenom
if (!preg_match("#[a-zA-Z]+#", $firstname) || strlen($firstname) > 80 || strlen($firstname) < 2){
	$listOfErrors[] = 2;
	$error = true;
}
//Vérification du format de l'email
if (!filter_var($email, FILTER_VALIDATE_EMAIL) ) {
	$listOfErrors[] = 3;
	$error = true;
}else{
	$connect = connectDb();
	$queryPrepared = $connect->prepare("SELECT userID FROM users WHERE email =:email");
	$queryPrepared->execute([":email"=>$email]);
	if (!empty( $queryPrepared->fetchAll())){
		$listOfErrors[] = 7;
		$error = true;
	}
}

//Vérification du pwd : min 8 max 64 chiffres lettres maj et min
if( strlen($pwd)<8 
	|| strlen($pwd)>64 
	|| !preg_match("#[a-z]#", $pwd)     
	|| !preg_match("#[0-9]#", $pwd)   
){
	$listOfErrors[] = 4;
$error = true;
}

//Vérification de l'égalité des mots de passe
if( $pwd != $pwdConfirm ){
	$listOfErrors[] = 5;
	$error = true;
}




if(!$error){
	$connect = connectDb();
	//Si aucune erreur
	//Se connecter à la base de donnée
	//insertion en bdd 
	$pwd = password_hash($pwd, PASSWORD_DEFAULT);
	$queryPrepared = $connect->prepare("INSERT INTO users(lastname,firstname,email,password) VALUES (:lastname,:firstname,:email,:pwd)");
	$queryPrepared->execute(["lastname"=>$lastname,"firstname"=>$firstname,"email"=>$email,"pwd"=>$pwd]);
	header("Location:index.php");

	}else{
		//Sinon
		// -> redirection sur register avec les erreurs et les données	
		$_SESSION["errorsForm"] = $listOfErrors;
		unset($_POST["pwd"]);
		unset($_POST["pwdConfirm"]);
		$_SESSION["postForm"] = $_POST;
		header("Location:register.php");
	}
}else{
	//Si tentative de hack afficher "Tentative de hack avec IP"		
	die("Tentative de hack");
}