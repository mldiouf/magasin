<?php
include  "header.php";
include_once "../model/function.php";
if (!empty($_GET['id'])) {
 $client = getClients($_GET['id']);
}
?>
  <?php include "menu.php" ?>
  <div class="col-3">
  <form action="<?= !empty($_GET['id']) ? "../model/modifClient.php" : "../model/ajoutClient.php"  ?>" method="post">
  <div class="form-group">
    <label for="nom_article">Nom</label>
    <input value="<?= !empty($_GET['id']) ? $client['nom'] : "" ?>" type="text" class="form-control" id="nom   " name="nom">
    <input value="<?= !empty($_GET['id']) ? $client['id'] : "" ?>" type="hidden" class="form-control" id="id" name="id">
  </div>
  <div class="form-group">
    <label for="nom_article">Prenom</label>
    <input value="<?= !empty($_GET['id']) ? $client['prenom'] : "" ?>" type="text" class="form-control" id="prenom" name="prenom">
  </div>

  <div class="form-group">
    <label for="telephone">N telephone</label>
    <input value="<?= !empty($_GET['id']) ? $client['telephone'] : "" ?>" type="text" class="form-control" id="telephone" name="telephone">
  </div>
  <div class="form-group">
    <label for="adresse">Adresse </label>
    <input value="<?= !empty($_GET['id']) ? $client['adresse'] : "" ?>" type="text" class="form-control" id="adresse" name="adresse">
  </div>

  <button class="btn btn-primary" type="submit">Valider</button>
</form>
  </div>
  <div class="col-9">
  <table class="table">
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Action</th>
                </tr>
                <?php 
                    $client =  getClients();
                    if (!empty($client) && is_array($client)) {
                        foreach ($client as $key => $value){
                            ?>
                                <tr>
                                    <td><?= $value['nom']; ?></td>
                                    <td><?= $value['prenom']; ?></td>
                                    <td><?= $value['telephone']; ?></td>
                                    <td><?= $value['adresse']; ?></td>
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
<div class="home-content">
    <div class="overview-boxes">
        <div class="box">
            <?php if (!empty($_SESSION['message']['text'])) {
                 ?>
                    <div class="alert <?= $_SESSION['message']['type'] ?>">
                    <?= $_SESSION['message']['text'] ?>
                    </div>
                <?php
            } ?>
        </div>
        <div class="box">
            
        </div>
    </div>

<?php include_once "footer.php" ?>