<?php



define("DB_HOST","localhost");
define("DB_NAME","wilhem");
define("DB_PORT","3306");
define("DB_USER","root");
define("DB_PWD","root");
define("DB_DRIVER","mysql");

$listOfErrors=[
	1=>"Votre nom est incorrect",
	2=>"Votre prenom est incorrect",
	3=>"Votre email n'est pas correct",
	4=>"Votre mot de passe doit faire entre 8 et 64 caractères avec des lettres et des chiffres",
	5=>"Votre mot de passe de confirmation ne correspond pas",
	6=>"Mauvais captcha",
	7=>"Email deja utilisé",
	8=>"Le mot de passe entré n'est pas votre ancien mot de passe"
];

$listOfStates=[
	0=>"User",
	1=>"Admin",
	2=>"Banni"
];

$listOfMonths=[
    1=>"Janvier",
    2=>"Fevrier",
    3=>"Mars",
    4=>"Avril",
    5=>"Mai",
    6=>"Juin",
    7=>"Juillet",
    8=>"Aout",
    9=>"Septembre",
    10=>"Octobre",
    11=>"Novembre",
    12=>"Decembre"
];

$listOfGender = [0=>"Monsieur", 1=>"Madame", 2=>"Autre"];
$defaultGender = 0;

