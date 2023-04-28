<?php 
require_once('../inclusion/init.inc.php');

if(isset($_GET['id'])){
    $request = "DELETE FROM produit WHERE id_produit = :id_product";
    $resultat = $pdo->prepare($request);
    $resultat->execute(['id_produit' => $_GET['id']]);

    // ? Ajouter message session

    header('Location: gestionProduit.php');
    exit;
}
?>