
bienvenue


<?php
 require_once('../models/server.php');
 // On récupère la session
 // On teste pour voir si nos variables de session ont bien été enregistrées
 if (isset($_SESSION['username']) && isset($_SESSION['email'])) {
 echo "<p style=text-align:right;>Bienvenue : ".$_SESSION['username']."(".$_SESSION['email'].")";
 echo '<br><a href="./logout.php">Deconnexion</a></p>';
 }
 ?>
 <form action="logout.php" method="post">
 <input type="submit" value="Déconnexion">
</form>