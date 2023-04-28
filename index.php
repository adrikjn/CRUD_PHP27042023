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
            <div class="card-header"><?= $produit['type']; ?></div>
            <div class="card-body">
                <h4 class="card-title text-center"><?= $produit['titre']; ?></h4>
                <div class="text-center">
                    <img src="https://picsum.photos/200/200" alt="">
                </div>
                <h5 class="my-3">Details : </h5>
                <p class="card-text">
                    <ul>
                        <li>Genre : <?= $produit['genre']; ?></li>
                        <li>Taille : <?= strtoupper($produit['taille']); ?></li>
                        <li>Matière : <?= $produit['matiere']; ?></li>

                </ul>
            </p>
            </div>
        </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<?php require_once('inclusion/footer.inc.php'); ?>