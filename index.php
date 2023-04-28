<?php require_once('inclusion/header.inc.php'); ?>
<?php 

    $request = "SELECT * FROM produit";
    $resultat = $pdo->prepare($request);
    $resultat->execute();

    $produits = $resultat->fetchAll(PDO::FETCH_ASSOC);
    // debug($produits);
?>

<h1 class="text-center mt-5">Ma boutique de vêtements</h1>

<div class="container mt-4">
    <div class="row d-flex justify-content-between">
    <?php foreach($produits as $produit): ?>
        <!-- <?php debug($produit); ?> -->
        <div class="col-4 px-3">
        <div class="card border-primary mb-3">
            <div class="card-header"><?= $produit['prix'] . "€"; ?></div>
            <div class="card-body">
                <h4 class="card-title"><?= $produit['titre']; ?></h4>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<?php require_once('inclusion/footer.inc.php'); ?>