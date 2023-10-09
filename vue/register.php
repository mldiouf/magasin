<?php include('../model/server.php');
	include_once "../header.php";
	include_once "../navbar.php";
?>

  <div class="container mt-4">
  <div >
  	<h2 class="text-center">Registre</h2>
  </div>
	
  <form method="post" action="register.php">
  	<div class="mb-3">
  	  <label for="exampleInputEmail1" class="form-label">Nom d'utilisateur</label>
  	  <input class="form-control" type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="mb-3">
  	  <label for="exampleInputEmail1" class="form-label">E-mail</label>
  	  <input class="form-control" type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="mb-3">
  	  <label for="exampleInputEmail1" class="form-label">Mot de passe</label>
  	  <input class="form-control" type="password" name="password_1">
  	</div>
  	<div class="mb-3">
  	  <label for="exampleInputEmail1" class="form-label">Confirmez le mot de passe</label>
  	  <input class="form-control" type="password" name="password_2">
  	</div>
  	<div class="mb-3">
  	  <button type="submit" class="btn btn-primary" name="reg_user">Registre</button>
  	</div>
  	<div >
	  Déjà membre ? <a href="login.php">Se connecter</a>
</div>
  </form>
  </div>
  <?php include_once("../footer.php"); ?>