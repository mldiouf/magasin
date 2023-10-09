<?php
include  "header.php";
include_once "../model/function.php";
if (!empty($_GET['id'])) {
  $article = getVente($_GET['id']);
}
?>

<?php include "menu.php" ?>
<div class="col-3">
  <form action="<?= !empty($_GET['id']) ? "../model/modifVente.php" : "../model/ajoutVente.php"  ?>" method="post">
    <div class="form-group">
      <label for="id_article">Article a vendre</label> 
      <select class="form-control form-control-lg" onchange="setPrix()" id="id_article" name="id_article">
      <option></option>
       <?php
        $articles = getArticles();
        if (!empty($articles) && is_array($articles)) {
          foreach ($articles as $key => $value) {
        ?>
            <option data-prix="<?= $value['prix_unitaire']?>" value="<?= $value['id']  ?>"><?= $value['nom_article'] . " -  " . $value['quantite'] . " disponibles"  ?></option>
        <?php
          }
        }
        ?>
      </select>
    </div>
    <div class="form-group">
      <label for="id_article">Client</label>
      <select class="form-control form-control-lg" id="id_client" name="id_client">
      <option></option>

        <?php
        $clients = getClients();
        if (!empty($clients) && is_array($clients)) {
          foreach ($clients as $key => $value) {
        ?>
            <option  value="<?= $value['id']  ?>"><?= $value['prenom'] . "   " . $value['nom']  ?></option>
        <?php
          }
        }
        ?>
      </select>
    </div>
    <div class="form-group">
      <label for="quantite">quantite</label>
      <input onclick="setPrix()" value="<?= !empty($_GET['id']) ? $article['quantite'] : "" ?>" type="number" class="form-control" id="quantite" name="quantite">
    </div>
    <div class="form-group">
      <label for="prix_unitaire">Prix</label>
      <input value="<?= !empty($_GET['id']) ? $article['prix'] : "" ?>" type="number" class="form-control" id="prix" name="prix">
    </div>
    <button class="btn btn-primary mt-2" type="submit">Valider la vente</button>

    <?php 
    
        if (!empty($_SESSION['message']['text'])) {
          ?>
            <div class="alert-<?=$_SESSION['message']['type']  ?>">
                <?=$_SESSION['message']['text']?>
            </div>
          <?php
        }

    ?>

  </form>
</div>
<div class="col-9">
<h2 class="text-center mb-4">Liste des Produits vendu</h2>

  <table class="table">
    <tr>
      <th scope="col">Article</th>
      <th scope="col">Client</th>
      <th scope="col">Quantité</th>
      <th scope="col">Prix unitaire</th>
      <th scope="col">Date</th>
      <th scope="col">Action</th>
    </tr>
    <?php
    $vente =  getVente();
    if (!empty($vente) && is_array($vente)) {
      foreach ($vente as $key => $value) {
    ?>
        <tr>
          <td><?= $value['nom_article']; ?></td>
          <td><?= $value['prenom']. " ".$value['nom']; ?></td>
          <td><?= $value['quantite']; ?></td>
          <td><?= $value['prix']; ?></td>
          <td><?= date('d/m/Y H:i:s', strtotime($value['date_vente'])) ?></td>
          <td><a href="recuVente.php?id=<?= $value['id'] ?>"><i class="bi bi-file-earmark-pdf-fill"></i></a></td>
          <td><a onclick="annuleVente(<?= $value['id'] ?>, <?= $value['idArticle'] ?>, <?= $value['quantite'] ?>)" href=""><i class="bi bi-trash-fill"></i></a></td>

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

  <script>

    function annuleVente(idVente, idArticle, quantite){
      if(confirm("Voulez-vous annuler cette vente ?")){
        window.location.href = "../model/annuleVente.php?idVente="+idVente+"&idArticle="+ idArticle+"&quantite="+quantite
      }
    }


    function setPrix(){
      var article = document.querySelector('#id_article');
      var quantite = document.querySelector('#quantite');
      var prix = document.querySelector('#prix');

      var prixUnitaire = article.options[article.selectedIndex].getAttribute('data-prix');
      prix.value = Number(quantite.value) * Number(prixUnitaire);
    }
  </script>