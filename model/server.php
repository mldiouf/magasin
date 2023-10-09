<?php
session_start();

// initialisation des variables 
$username = "";
$email    = "";
$errors = array(); 

// connecter a la base de donnees
$db = mysqli_connect('localhost', 'root', '', 'gestion_stock');


// NREGISTRER L'UTILISATEUR
if (isset($_POST['reg_user'])) {
  // recevoir toutes les valeurs d'entrée du formulaire
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

// validation du formulaire : s'assurer que le formulaire est correctement rempli...
// en ajoutant (array_push()) l'erreur correspondante au tableau $errors
  if (empty($username)) { array_push($errors, "Nom d'utilisateur est nécessaire"); }
  if (empty($email)) { array_push($errors, "L'e-mail est requis"); }
  if (empty($password_1)) { array_push($errors, "Mot de passe requis"); }
  if ($password_1 != $password_2) {
	array_push($errors, "les deux mots de passe ne correspondent pas");
  }


// vérifie d'abord la base de données pour être sûr
// un utilisateur n'existe pas déjà avec le même nom d'utilisateur et/ou email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // si l'utilisateur existe
    if ($user['username'] === $username) {
      array_push($errors, "Ce nom d'utilisateur existe déjà");
    }

    if ($user['email'] === $email) {
      array_push($errors, "l'email existe déjà");
    }
  }


// Enfin, enregistrez l'utilisateur s'il n'y a pas d'erreur dans le formulaire
  if (count($errors) == 0) {
  	$password = md5($password_1);//crypter le mot de passe avant de l'enregistrer dans la base de données

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "Vous êtes maintenant connecté";
  	header('location: login.php');
  }
}

// CONNEXION UTILISATEUR
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Nom d'utilisateur est nécessaire");
  }
  if (empty($password)) {
  	array_push($errors, "Mot de passe requis");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "Vous êtes maintenant connecté";
  	  header('location: article.php');
  	}else {
  		array_push($errors, "Mauvaise combinaison nom d'utilisateur/mot de passe");
  	}
  }
}







?>
