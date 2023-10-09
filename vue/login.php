<?php include('../model/server.php');
	include_once "../header.php";
include_once "../navbar.php";
?>

<div class="container mt-4">
<div>
  	<h2 class="">Se connecter</h2>
</div>
	  
<form method="post" action="login.php">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nom d'utilisateur</label>
    <input type="text" class="form-control" name="username" >
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
    <input type="password" class="form-control" name="password">
  </div>
  <button type="submit" class="btn btn-primary" name="login_user">Se connecter</button>
  <p>
	  Pas encore membre ? <a href="register.php">S'inscrire</a>
  	</p>
</form>
</div>

<?php include_once "../footer.php"; ?>