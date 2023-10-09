<?php include "connexion.php";

function getArticles($id=null) {
    if (!empty($id)) {
        $sql = "SELECT * FROM article WHERE id=?";
        $req = $GLOBALS['connexion']->prepare($sql);
        $req->execute(array($id));
        return $req->fetch();
    }else{
        $sql = "SELECT * FROM article";
        $req = $GLOBALS['connexion']->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }
}

function getClients($id=null) {
    if (!empty($id)) {
        $sql = "SELECT * FROM client WHERE id=?";
        $req = $GLOBALS['connexion']->prepare($sql);
        $req->execute(array($id));
        return $req->fetch();
    }else{
        $sql = "SELECT * FROM client";
        $req = $GLOBALS['connexion']->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }
}

function getVente($id=null) {
    if (!empty($id)) {
        $sql = "SELECT v.id,nom_article, nom, prenom, v.quantite, telephone, prix, date_vente, adresse, prix_unitaire 
        FROM client AS c, vente AS v, article AS a WHERE v.id_article=a.id AND v.id_client=c.id AND v.id=? AND etat=?";
        $req = $GLOBALS['connexion']->prepare($sql);
        $req->execute(array($id,1));
        return $req->fetch();
    }else{
        $sql =  "SELECT v.id AS id,nom_article, nom, prenom, v.quantite, prix, date_vente, adresse, a.id AS idArticle
        FROM client AS c, vente AS v, article AS a WHERE v.id_article=a.id AND v.id_client=c.id AND etat=?";
        $req = $GLOBALS['connexion']->prepare($sql);
        $req->execute(array(1));
        return $req->fetchAll();
    }
}