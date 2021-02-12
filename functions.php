<?php

function connectDb(){
	try{

		$connect = new PDO(DB_DRIVER.":host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT, DB_USER, DB_PWD);

	}catch(Exception $e){

		die("Erreur SQL ".$e->getMessage());

	}
	return $connect;
}


function isConnected(){

	if(isset($_SESSION["auth"]) && $_SESSION["auth"] && $_SESSION["rank"]!= 3){

		$connect = connectDB();
		
		$query = $connect->prepare("SELECT userID FROM users WHERE email = :email");
		$query->execute(["email"=>$_SESSION["email"]]);

		$resultat = $query->fetch();

		return true;
	}else{
		return false;
	}

}