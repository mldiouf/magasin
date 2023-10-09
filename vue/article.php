<?php
include  "header.php";
include_once "../model/function.php";
if (!empty($_GET['id'])) {
 $article = getArticles($_GET['id']);
}
session_start();
?>

  <?php include "menu.php" ?>
  <div class="col-3">
  <form action="<?= !empty($_GET['id']) ? "../model/modifArticle.php" : "../model/ajoutArticle.php"  ?>" method="post">
  <div class="form-group">
    <label for="nom_article">Non de l'article</label>
    <input value="<?= !empty($_GET['id']) ? $article['nom_article'] : "" ?>" type="text" class="form-control" id="nom_article" name="nom_article">
    <input value="<?= !empty($_GET['id']) ? $article['id'] : "" ?>" type="hidden" class="form-control" id="id" name="id">
  </div>
  <div class="form-group">
    <label for="categorie">categorie</label>
    <select class="form-control form-control-lg" id="categorie" name="categorie">
        <option <?= !empty($_GET['id']) && $article['categorie'] == "Ordinateur" ? "select" : "" ?> value="Ordinateur">Ordinateur</option>
        <option <?= !empty($_GET['id']) && $article['categorie'] == "Imprimante" ? "select" : "" ?> value="Imprimante">Imprimante</option>
        <option <?= !empty($_GET['id']) && $article['categorie'] == "Accessoire" ? "select" : "" ?> value="Accessoire">Accessoire</option>
</select>
</div>
  <div class="form-group">
    <label for="quantite">quantite</label>
    <input value="<?= !empty($_GET['id']) ? $article['quantite'] : "" ?>" type="number" class="form-control" id="quantite" name="quantite">
  </div>
  <div class="form-group">
    <label for="prix_unitaire">prix unitaire</label>
    <input value="<?= !empty($_GET['id']) ? $article['prix_unitaire'] : "" ?>" type="number" class="form-control" id="prix_unitaire" name="prix_unitaire">
  </div>
  <div class="form-group">
    <label for="date_fabrication">date_fabrication</label>
    <input value="<?= !empty($_GET['id']) ? $article['date_fabrication'] : "" ?>" type="datetime-local" class="form-control" id="date_fabrication" name="date_fabrication">
  </div>
  <div class="form-group">
    <label for="date_expiration">date_expiration</label>
    <input value="<?= !empty($_GET['id']) ? $article['date_expiration'] : "" ?>" type="datetime-local" class="form-control" id="date_expiration" name="date_expiration">
  </div>
  <button class="btn btn-primary" type="submit">Valider</button>
  <?php 
    
    if (!empty($_SESSION['message']['text'])) {
      ?>
        <div class="alert <?=$_SESSION['message']['type'] ?>">
            <?=$_SESSION['message']['text']?>
        </div>
      <?php
    }

?>
</form>
  </div>
  <div class="col-9">
  <table class="table">
                <tr>
                    <th scope="col">Nom article</th>
                    <th scope="col">Categorie</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">Prix unitaire</th>
                    <th scope="col">Date de fabrication</th>
                    <th scope="col">date d'expiration</th>
                    <th scope="col">Action</th>
                </tr>
                <?php 
                    $article =  getArticles();
                    if (!empty($article) && is_array($article)) {
                        foreach ($article as $key => $value){
                            ?>
                                <tr>
                                    <td><?= $value['nom_article']; ?></td>
                                    <td><?= $value['categorie']; ?></td>
                                    <td><?= $value['quantite']; ?></td>
                                    <td><?= $value['prix_unitaire']; ?></td>
                                    <td><?=date('d/m/Y H:i:s', strtotime( $value['date_fabrication'])) ?></td>
                                    <td><?=date('d/m/Y H:i:s', strtotime( $value['date_expiration'])) ?></td>
                                    <td><a href="?id=<?= $value['id']; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                </tr>
                            <?php
                        }
                    }
                ?>
            </table>
  </div>
</div>
</div>



<?php include_once "footer.php" ?>