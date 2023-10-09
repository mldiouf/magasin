<?php 
include "connexion.php";

if(
    !empty($_POST['nom'])
    && !empty($_POST['prenom'])
    && !empty($_POST['telephone'])
    && !empty($_POST['adresse'])
){
    $sql = "UPDATE client SET nom=?, prenom=?, telephone=?, adresse=? 
    WHERE id=?";
    $req = $connexion->prepare($sql);
    $req->execute(array(
        $_POST['nom'],
        $_POST['prenom'],
        $_POST['telephone'],
        $_POST['adresse'],
        $_POST['id']
    ));

    if ($req->rowCount() != 0) {
        $_SESSION['message']['text'] = "Client modifie";
        $_SESSION['message']['type'] = "success";
    }else {
        $_SESSION['message']['text'] = "une erreur s est produite lors de la modification du client";
        $_SESSION['message']['type'] = "danger";
    }

}else{
    $_SESSION['message']['text'] = "Une Information obligatoire non remplie";
    $_SESSION['message']['type'] = "danger";
}

header("Location: ../vue/client.php");