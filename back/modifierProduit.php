<?php require_once('../inclusion/header.inc.php'); ?>
<?php 
    if(isset($_GET['id'])){
        // debug($_GET['id']);
        $request= "SELECT * FROM produit WHERE id_produit = :id_produit";
        $resultat = $pdo->prepare($request);
        $resultat->execute(['id_produit' => $_GET['id']]);
        $produit = $resultat->fetch(PDO::FETCH_ASSOC);

        // debug($produit);
        // debug($_POST)
    }
    // ! ctrl + h on remplacel es $_POST par $produit pour faire afficher les produits qu'on a selectionné selon l'id (regarder $_GET) déja écrit
?>


    <h1 class="text-center my-3">Modifier le produit</h1>

    <div class="container mt-3 p-3 border border-light rounded">
<form class="p-5" method="post">
  <fieldset>
    <div class="form-group">
      <label for="titre" class="col-sm-2 col-form-label">titre</label>
    <input type="text" class="form-control" id="titre" name="titre" value="<?= $produit['titre'] ?? ''; ?>">
    <small class="text-danger"><?= $error['titre'] ?? ''; ?></small>
      
    </div>

    <div class="form-group">
      <label for="marque" class="form-label mt-4">Marque</label>
      <select class="form-select" id="marque" name="marque">
        <option class="text-center" value="">---Selectionnez une marque---</option>
        <option <?= (isset($produit['marque']) && $produit['marque'] == 'adidas') ? "selected" : ""; ?> value="adidas">Adidas</option>
        <option <?= (isset($produit['marque']) && $produit["marque"] == 'nike') ? "selected" : "" ; ?> value="nike">Nike</option>
        <option <?= (isset($produit['marque']) && $produit["marque"] == 'maje') ? "selected" : "" ; ?> value='maje'>Maje</option>
      </select>
    <small class="text-danger"><?= $error['marque'] ?? ''; ?></small>

    </div>
    <div class="form-group">
      <label for="matiere" class="form-label mt-4">Matière</label>
      <select class="form-select" id="matiere" name="matiere">
      <option class="text-center" value="">---Selectionnez une matière---</option>
        <option <?= (isset($produit['matiere']) && $produit['matiere'] == 'coton') ? "selected" : ""; ?> value="coton">Coton</option>
        <option <?= (isset($produit['matiere']) && $produit['matiere'] == 'synthetique') ? "selected" : ""; ?> value="synthetique">Synthétique</option>
        <option <?= (isset($produit['matiere']) && $produit['matiere'] == 'lin') ? "selected" : ""; ?> value='lin'>Lin</option>
      </select>
    <small class="text-danger"><?= $error['matiere'] ?? ''; ?></small>
    </div>
    <div class="form-group">
      <label for="couleur" class="form-label mt-4">Couleur</label>
      <select class="form-select" id="couleur" name="couleur">
      <option class="text-center" value="">---Selectionnez une couleur---</option>
        <option <?= (isset($produit['couleur']) && $produit['couleur'] == "r" ? "selected" : ""); ?> value="r">Rouge</option>
        <option <?= (isset($produit['couleur']) && $produit['couleur'] == "g" ? "selected" : ""); ?> value="g">Vert</option>
        <option <?= (isset($produit['couleur']) && $produit['couleur'] == "b" ? "selected" : ""); ?> value='b'>Bleu</option>
      </select>
    <small class="text-danger"><?= $error['couleur'] ?? ''; ?></small>
    </div>
    <div class="form-group">
      <label for="taille" class="form-label mt-4">Taille</label>
      <select class="form-select" id="taille" name="taille">
      <option class="text-center" value="">---Selectionnez une taille---</option>
        <option <?= (isset($produit['taille']) && $produit['taille'] == "s" ? "selected" : ""); ?> value="s">Small</option>
        <option <?= (isset($produit['taille']) && $produit['taille'] == "m" ? "selected" : ""); ?> value="m">Medium</option>
        <option <?= (isset($produit['taille']) && $produit['taille'] == "l" ? "selected" : ""); ?> value='l'>Large</option>
      </select>
    <small class="text-danger"><?= $error['taille'] ?? ''; ?></small>
    </div>
    <div class="form-group">
      <label for="genre" class="form-label mt-4">Genre</label>
      <select class="form-select" id="genre" name="genre">
      <option class="text-center" value="">---Selectionnez un genre---</option>
        <option <?= (isset($produit['genre']) && $produit['genre'] == "m" ? "selected" : ""); ?> value="m">Homme</option>
        <option <?= (isset($produit['genre']) && $produit['genre'] == "w" ? "selected" : ""); ?> value="w">Femme</option>
        <option <?= (isset($produit['genre']) && $produit['genre'] == "u" ? "selected" : ""); ?> value='u'>Unisexe</option>
      </select>
    <small class="text-danger"><?= $error['genre'] ?? ''; ?></small>
    </div>
    <div class="form-group">
      <label for="type" class="form-label mt-4">Type</label>
      <select class="form-select" id="type" name="type">
      <option class="text-center" value="">---Selectionnez un type---</option>
        <option <?= (isset($produit['type']) && $produit['type'] == "t-shirt" ? "selected" : ""); ?> value="t-shirt">t-shirt</option>
        <option <?= (isset($produit['type']) && $produit['type'] == "pantalon" ? "selected" : ""); ?> value="pantalon">pantalon</option>
        <option <?= (isset($produit['type']) && $produit['type'] == "chaussure" ? "selected" : ""); ?> value='chaussure'>chaussure</option>
      </select>
    <small class="text-danger"><?= $error['type'] ?? ''; ?></small>
    </div>
    <div class="form-group">
      <label for="prix" class="form-label mt-4">Prix</label>
      <input class="form-control" type="number" min="0" step="0.01" id="prix" name="prix" value="<?= $produit['prix'] ?? ''; ?>">
    </div>
  <small class="text-danger"><?= $error['prix'] ?? ''; ?></small>
    
    <button type="submit" class="btn btn-primary">ajout produit</button>
  </fieldset>
</form>
</div>

<?php require_once('../inclusion/footer.inc.php'); ?>






<!-- Ce code est écrit en langage de programmation PHP et il utilise des variables superglobales pour récupérer des informations à partir de l'URL.

La première ligne vérifie si une variable avec le nom "id" est présente dans l'URL. Si c'est le cas, cela signifie que l'utilisateur a envoyé une requête GET avec un paramètre "id" qui correspond à l'identifiant d'un produit dans une base de données.

Ensuite, le code crée une requête SQL préparée pour récupérer les informations du produit correspondant à l'identifiant passé en paramètre. La requête utilise la syntaxe ":id_produit" pour indiquer un paramètre nommé que nous associons avec la valeur de $_GET['id'].

La requête est ensuite exécutée avec la méthode "execute()" qui prend en paramètre un tableau associatif qui associe le nom du paramètre avec sa valeur.

Enfin, la méthode "fetch()" est utilisée pour récupérer les informations du produit sous forme d'un tableau associatif, stocké dans la variable $produit. Si aucun produit ne correspond à l'identifiant, la variable $produit sera null. -->