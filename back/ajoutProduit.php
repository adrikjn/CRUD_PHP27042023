<?php require_once('../inclusion/header.inc.php'); ?>

<h1 class="text-center mt-5">Ajout produit</h1>

<div class="container mt-3 p-3 border border-light rounded">


<form class="p-5" method="post">
  <fieldset>
    <div class="form-group">
      <label for="titre" class="col-sm-2 col-form-label">Titre</label>
        <input type="text"  class="form-control" id="titre" name="titre">
    </div>
  
    <div class="form-group">
      <label for="marque" class="form-label mt-4">Marque</label>
      <select class="form-select" id="marque" name="marque">
        <option value="adidas">Adidas</option>
        <option value="nike">Nike</option>
        <option value="maje">MAJE</option>
      </select>
    </div>

    <div class="form-group">
      <label for="matiere" class="form-label mt-4">Matière</label>
      <select class="form-select" id="matiere" name="matiere">
        <option value="coton">Coton</option>
        <option value="synthetique">Synthétique</option>
        <option value="lin">Lin</option>
      </select>
    </div>
   
    
    <div class="form-group">
      <label for="couleur" class="form-label mt-4">Couleur</label>
      <select class="form-select" id="couleur" name="couleur">
        <option value="r">Rouge</option>
        <option value="g">Vert</option>
        <option value="b">Bleu</option>
      </select>
    </div>
   

    <div class="form-group">
      <label for="taille" class="form-label mt-4">Taille</label>
      <select class="form-select" id="taille" name="taille">
        <option value="s">Small</option>
        <option value="m">Medium</option>
        <option value="l">Large</option>
      </select>
    </div>
   
    <div class="form-group">
      <label for="genre" class="form-label mt-4">Genre</label>
      <select class="form-select" id="genre" name="genre">
        <option value="m">Homme</option>
        <option value="w">Femme</option>
        <option value="u">Unisexe</option>
      </select>
    </div>    

    <div class="form-group">
      <label for="type" class="form-label mt-4">Type</label>
      <select class="form-select" id="type" name="type">
        <option value="t-shirt">t-shirt</option>
        <option value="pantalon">pantalon</option>
        <option value="chaussure">chaussure</option>
      </select>
    </div>


    <div class="form-group">
      <label for="formFile" class="form-label mt-4">Prix</label>
      <input class="form-control" type="number" id="prix" min="0" step="0.01" name="prix">
    </div>
   
    <button type="submit" class="btn btn-primary mt-3">Submit</button>
  </fieldset>
</form>

</div>

<?php require_once('../inclusion/footer.inc.php'); ?>




