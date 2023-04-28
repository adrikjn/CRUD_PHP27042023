<?php require_once('../inclusion/header.inc.php'); ?>
<?php 
    if(isset($_GET['id'])){
        // debug($_GET['id']);
        $request= "SELECT * FROM produits WHERE id_produit = :id_produit";
    }
?>

    <h1 class="text-center my-3">Modifier le produit</h1>

<?php require_once('../inclusion/footer.inc.php'); ?>