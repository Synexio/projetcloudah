<?php
session_start();
require "conf.inc.php";
require "functions.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Cours Wilhem</title>

  <!-- Custom fonts for this theme -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Theme CSS -->
  <link href="css/freelancer.css" rel="stylesheet">

</head>

<body class="register" id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Cours Wilhem</a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#portfolio">Réservations</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about"> Infos</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <?php

$error = "";
  //VERIFICATION DE L'AUTHENTIFICATION
if(isset($_POST["email"]) && isset($_POST["pwd"])){

    //Connexion a la bdd
  $connect = connectDB();
    //Récupérer le mot de passe hashé correspondant à $_POST["email"]
  $query = $connect->prepare("SELECT * FROM users WHERE email = :email");
  $query->execute(["email"=>$_POST["email"]]);

  $resultat = $query->fetch();

    //$resultat['pwd']
    //vérifier la correspondance entre le mot de passe
    //du input et le mot de passe hashé -> password_verify
  if( password_verify( $_POST["pwd"], $resultat['password'] )){
    $query = $connect->prepare("SELECT rank FROM users WHERE email = ?");
    $query->execute([$_POST["email"]]);

    $rank = $query->fetch();
    $rank = $rank[0];

    if($rank!=3){
      //Si password_verify retourne true alors on va créer une session

    $_SESSION["auth"] = true;
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["userID"] = $resultat["userID"];
    $_SESSION["lastname"] = $resultat["lastname"];
    $_SESSION["firstname"] = $resultat["firstname"];
    $_SESSION["password"] = $resultat["password"];
    $_SESSION["rank"] = $resultat["rank"];

   header("Location:index.php");

    }else{
        $error = "Compte banni";
    }
  }else{
    //Sinon Affichage d'une erreur
    $error = "Identifiants incorrects";
  }
}

?>

  <!-- Masthead -->
  <header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">

      <!--  Masthead Avatar Image 
      <img class="masthead-avatar mb-5" src="img/portfolio/avataaars2.svg" alt=""> -->

      <!-- Masthead Heading -->
      <h1 class="masthead-heading text-uppercase mb-0">Connecte-toi !</h1>

      <!-- Icon Divider -->
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-graduation-cap"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      

    </div>
  </header>

<div class="row rowsignup mb-5">
<div class="col-md-5"></div>
<div class="col-md-2 text-center">

<form class="form-login my-5" method="POST">
      <label for="inputEmail" class="sr-only">Adresse mail</label>
       <input type="email" id="inputEmail" class="form-control my-2" placeholder="Adresse mail" required="required" name="email">
      <label for="inputPassword" class="sr-only">Mot de passe</label>
      <input type="password" id="inputPassword" class="form-control my-2" placeholder="Mot de passe" required="required" name="pwd">
      <button class="btn btn-dark my-3" type="submit">Se connecter</button>
      <a href="register.php" class="btn btn-dark mx-3">S'inscrire</a>
    </form>
    <?php if(!empty($error)) echo '<div class="alert alert-danger">'.$error.'</div>';?>
  </div>
  <div class="col-md-5"></div>
</div>






 <!-- Copyright Section -->
  <section class=" footer2 copyright py-4 text-center text-white">
    <div class="container">
      <small>Copyright &copy; Cours Wilhem 2019</small>
    </div>
  </section>

  <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
  <div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
      <i class="fa fa-chevron-up"></i>
    </a>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/freelancer.min.js"></script>

</body>

</html>