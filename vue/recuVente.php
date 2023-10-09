<?php
include  "header.php";
include_once "../model/function.php";
if (!empty($_GET['id'])) {
  $vente = getVente($_GET['id']);
  $taux = ($vente['prix'] /100) * 15;
}
// ?>
   <?php
//     $vente =  getVente();
//     if (!empty($vente) && is_array($vente)) {
//       foreach ($vente as $key => $value) {
//     ?>
<div class="card">
  <div class="card-body">
    <div class="container mb-5 mt-3">
      <div class="row d-flex align-items-baseline">
        <div class="col-xl-3 float-end">
          <a id="btnPrint" class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark"><i
              class="fas fa-print text-primary"></i> Print</a>
          <a href="article.php" class="btn btn-light text-capitalize" data-mdb-ripple-color="dark"><i
              class="far fa-file-pdf text-danger"></i> Exit</a>
        </div>
        <hr>
      </div>

      <div class="container">
        <div class="col-md-12">
          <div class="text-center">
            <i class="fab fa-mdb fa-4x ms-0" style="color:#5d9fc5 ;"></i>
            <h2 class="pt-0">Facture</h2>
          </div>

        </div>


        <div class="row no-gutters">
          <div class="col-xl-8">
            <ul class="list-unstyled">
              <li class="text-muted"><span style="color:#5d9fc5 ;"><?= $vente['prenom']. " ".$vente['nom']; ?></span></li>
              <li class="text-muted">Adresse: <?= $vente['adresse']; ?></li>
              <li class="text-muted"><i class="fas fa-phone"></i><?= $vente['telephone']; ?></li>
            </ul>
          </div>
          <div class="col-xl-4">
            <ul class="list-unstyled">
              <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                  class="fw-bold">ID:</span>078<?= $vente['id']; ?></li>
              <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                  class="fw-bold">Creation Date: </span><?= $vente['date_vente']; ?></li>
              <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                  class="me-1 fw-bold">Status:</span><span class="badge bg-warning text-black fw-bold">
                  Unpaid</span></li>
            </ul>
          </div>
        </div>

        <div class="row my-2 mx-1 justify-content-center">
          <table class="table table-striped table-borderless">
            <thead style="background-color:#84B0CA ;" class="text-white">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Article</th>
                <th scope="col">quantité</th>
                <th scope="col">Prix Unitaire</th>
                <th scope="col">Montant</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td><?= $vente['nom_article']; ?></td>
                <td><?= $vente['quantite']; ?></td>
                <td><?= $vente['prix_unitaire']; ?> F CFA</td>
                <td><?= $vente['prix']; ?></td>
              </tr>
            </tbody>

          </table>
        </div>
        <div class="row">
          <div class="col-xl-8">
            <p class="ms-3">
Ajouter des notes supplémentaires et des informations de paiement</p>

          </div>
          <div class="col-xl-3">
            <ul class="list-unstyled">
              <li class="text-muted ms-3"><span class="text-black me-4">SubTotal</span><?= $vente['prix']; ?> F CFA</li>
              <li class="text-muted ms-3 mt-2"><span class="text-black me-4">Tax(15%)</span><?= $taux ?> F CFA</li>
            </ul>
            <p class="text-black float-start"><span class="text-black me-3"> Total Amount</span><span
                style="font-size: 25px;"><?= $vente['prix'] + $taux; ?> F CFA</span></p>
          </div>
        </div>
        <hr>


      </div>
    </div>
  </div>
</div>
<!-- <?php
      // }
    // }
    ?> -->
<?php include_once "footer.php" ?>

<script>

  var btnPrint =document.querySelector('#btnPrint');
btnPrint.addEventListener('click',() =>{
  window.print();
})


  function setPrix() {
    var article = document.querySelector('#id_article');
    var quantite = document.querySelector('#quantite');
    var prix = document.querySelector('#prix');

    var prixUnitaire = article.options[article.selectedIndex].getAttribute('data-prix');
    prix.value = Number(quantite.value) * Number(prixUnitaire);
  }
</script>