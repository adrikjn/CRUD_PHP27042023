<?php require_once('../inclusion/header.inc.php'); ?>
<?php 
    //* 1- Finir le tableau (càd mettre les bons champs en titre de colonne) + Une colonne option.
    // * 2- récupérer tout les produit
    $request = "SELECT * FROM produit";
    $resultat = $pdo->prepare($request);
    $resultat->execute();


    $produits = $resultat->fetchAll(PDO::FETCH_ASSOC);
    //* 3-Trouver ou boucler et faire l'affichage de nos différents produits
    // debug($produits);

?>

    <h1 class="text-center my-3">Gestion de nos produits</h1>

    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">id_produit</th>
      <th scope="col">titre</th>
      <th scope="col">marque</th>
      <th scope="col">matiere</th>
      <th scope="col">couleur</th>
      <th scope="col">taille</th>
      <th scope="col">genre</th>
      <th scope="col">prix</th>
      <th scope="col">type</th>
      <th scope="col">option</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($produits as $produit) :  ?>
    <tr class="table-primary">
      <!-- <?= debug($produit); ?> -->
      <td><?= $produit['id_produit']; ?></td>
      <td><?= $produit['titre']; ?></td>
      <td><?= $produit['marque']; ?></td>
      <td><?= $produit['matiere']; ?></td>
      <td><?= $produit['couleur']; ?></td>
      <td><?= $produit['taille']; ?></td>
      <td><?= $produit['genre']; ?></td>
      <td><?= $produit['prix']; ?></td>
      <td><?= $produit['type']; ?></td>
      <td></td>
      <?php endforeach; ?>
    </tr>
  </tbody>
</table>

<?php require_once('../inclusion/footer.inc.php'); ?>