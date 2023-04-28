a mettre dans snipets html.json 

{
	// Place your snippets for html here. Each snippet is defined under a snippet name and has a prefix, body and 
	// description. The prefix is what is used to trigger the snippet and the body will be expanded and inserted. Possible variables are:
	// $1, $2 for tab stops, $0 for the final cursor position, and ${1:label}, ${2:another} for placeholders. Placeholders with the 
	// same ids are connected.
	// Example:
	// "Print to console": {
	// 	"prefix": "log",
	// 	"body": [
	// 		"console.log('$1');",
	// 		"$2"
	// 	],
	// 	"description": "Log output to console"
	// }
	
	"echo": {
		
		"prefix": ["/"],
		"body": "<?= $1; ?>"  
	  },

	"short8":{
		"prefix": ["ph"],
		"body": ["<?php $1 ?>" ]
	},

	"Header":{
		"prefix": ["h"],
		"body": ["<?php require_once('../inclusion/header.inc.php'); ?>" ]
	},

	"footer":{
		"prefix": ["f"],
		"body": ["<?php require_once('../inclusion/footer.inc.php'); ?>" ]
	},
}


bootswatch 

https://cdnjs.com/libraries/bootswatch lien cdn 









<?php require_once('../inclusion/header.inc.php'); ?>
<?php 
// debug($_POST);

//*on verifie que le formulaire a été envoyé
if(!empty($_POST))
{

    //* on créé un tableau vide pour le remplir des différentes erreurs s'il y en a.
    $error=[];
    //*ici on vérifie que le champs titre (ou l'input de name titre) est vide (que l'utilisateur n'a pas saisie d'information)
    //*si c'est le cas alors on remplis notre tableau d'erreur avec l'indice titre et la valeur la dite erreur.
    if(empty($_POST['titre']))
    {
        $error['titre'] = "Le champs titre est obligatoire pour définir le produit";
    }
    if(empty($_POST['marque']))
    {
        $error['marque'] = "vous devez selectionner une marque";
    }
    if(empty($_POST['matiere']))
    {
        $error['matiere'] = "vous devez selectionner une matiere";
    }
    if(empty($_POST['couleur']))
    {
        $error['couleur'] = "vous devez selectionner une couleur";
    }
    if(empty($_POST['taille']))
    {
        $error['taille'] = "vous devez selectionner une taille";
    }
    if(empty($_POST['genre']))
    {
        $error['genre'] = "vous devez selectionner une genre";
    }
    if(empty($_POST['type']))
    {
        $error['type'] = "vous devez selectionner une type";
    }
    if(empty($_POST['prix']))
    {
        $error['prix'] = "vous devez choisir une prix";
    }

    //* cette condition on aurait pu m'etre if(empty($error))
    //* une variable vide renvoie false, on veut envoyé nos informations en BDD si $error est vide. donc je mettre comme condition !error pour avoir vrai et rentrer dans le traitement.
    if(!$error)
    {
      //* préparé la requête d'insertion avec nos marqueur pour les VALUES
        $request = "INSERT INTO produit (titre, marque, matiere, couleur, taille, genre, type, prix) VALUES (:titre, :marque, :matiere, :couleur, :taille, :genre, :type, :prix)";
      //* préparé notre tableau de donnés a envoyer en BDD suivant les différent marqueur de la requete (même ordre )
        $data = [
            'titre' => $_POST['titre'],
            'marque' => $_POST['marque'],
            'matiere' => $_POST['matiere'],
            'couleur' => $_POST['couleur'],
            'taille' => $_POST['taille'],
            'genre' => $_POST['genre'],
            'type' => $_POST['type'],
            'prix' => $_POST['prix']
        ];

        $resultat = $pdo->prepare($request);
        $resultat->execute($data);

        //* création d'un message de succès en session
        $_SESSION['messages']['success'][] = 'Votre produit a bien été créé';

        //* redirigé vers la page d'accueil 
        header('location:../');
        exit();

        
    }



}




//*echo isset($var) ? $var : $valeur_default; = echo $var ?? $valeur_default; 
?>

<h1 class="text-center mt-5">Ajout produit</h1>

<div class="container mt-3 p-3 border border-light rounded">
<form class="p-5" method="post">
  <fieldset>
    <div class="form-group">
      <label for="titre" class="col-sm-2 col-form-label">titre</label>
    <input type="text" class="form-control" id="titre" name="titre" value="<?= $_POST['titre'] ?? ''; ?>">
    <small class="text-danger"><?= $error['titre'] ?? ''; ?></small>
      
    </div>

    <div class="form-group">
      <label for="marque" class="form-label mt-4">Marque</label>
      <select class="form-select" id="marque" name="marque">
        <option class="text-center" value="">---Selectionnez une marque---</option>
        <option 
        <?= (isset($_POST['marque']) && $_POST['marque'] == 'adidas')? "selected" : "" ; ?> 
        value="adidas">Adidas</option>
        <option
        <?= (isset($_POST['marque']) && $_POST['marque'] == 'nike')? "selected" : "" ; ?> 
        value="nike">Nike</option>
        <option 
        <?= (isset($_POST['marque']) && $_POST['marque'] == 'maje')? "selected" : "" ; ?> 
        value='maje'>Maje</option>
      </select>
      <small class="text-danger"><?= $error['marque'] ?? ''; ?></small>
    </div>
    <div class="form-group">
      <label for="matiere" class="form-label mt-4">Matière</label>
      <select class="form-select" id="matiere" name="matiere">
      <option class="text-center" value="">---Selectionnez une matière---</option>
        <option <?= (isset($_POST['matiere']) && $_POST['matiere'] == 'coton')? "selected" : "" ; ?> value="coton">Coton</option>
        <option <?= (isset($_POST['matiere']) && $_POST['matiere'] == 'synthetique')? "selected" : "" ; ?> value="synthetique">Synthétique</option>
        <option <?= (isset($_POST['matiere']) && $_POST['matiere'] == 'lin')? "selected" : "" ; ?> value='lin'>Lin</option>
      </select>
      <small class="text-danger"><?= $error['matiere'] ?? ''; ?></small>
    </div>
    <div class="form-group">
      <label for="couleur" class="form-label mt-4">Couleur</label>
      <select class="form-select" id="couleur" name="couleur">
      <option class="text-center" value="">---Selectionnez une couleur---</option>
        <option <?= (isset($_POST['couleur']) && $_POST['couleur'] == 'r')? "selected" : "" ; ?> value="r">Rouge</option>
        <option <?= (isset($_POST['couleur']) && $_POST['couleur'] == 'g')? "selected" : "" ; ?> value="g">Vert</option>
        <option <?= (isset($_POST['couleur']) && $_POST['couleur'] == 'b')? "selected" : "" ; ?> value='b'>Bleu</option>
      </select>
      <small class="text-danger"><?= $error['couleur'] ?? ''; ?></small>
    </div>
    <div class="form-group">
      <label for="taille" class="form-label mt-4">Taille</label>
      <select class="form-select" id="taille" name="taille">
      <option class="text-center" value="">---Selectionnez une taille---</option>
        <option <?= (isset($_POST['taille']) && $_POST['taille'] == 's')? "selected" : "" ; ?> value="s">Small</option>
        <option <?= (isset($_POST['taille']) && $_POST['taille'] == 'm')? "selected" : "" ; ?> value="m">Medium</option>
        <option <?= (isset($_POST['taille']) && $_POST['taille'] == 'l')? "selected" : "" ; ?> value='l'>Large</option>
      </select>
      <small class="text-danger"><?= $error['taille'] ?? ''; ?></small>
    </div>
    <div class="form-group">
      <label for="genre" class="form-label mt-4">Genre</label>
      <select class="form-select" id="genre" name="genre">
      <option class="text-center" value="">---Selectionnez un genre---</option>
        <option <?= (isset($_POST['genre']) && $_POST['genre'] == 'm')? "selected" : "" ; ?> value="m">Homme</option>
        <option <?= (isset($_POST['genre']) && $_POST['genre'] == 'w')? "selected" : "" ; ?> value="w">Femme</option>
        <option <?= (isset($_POST['genre']) && $_POST['genre'] == 'u')? "selected" : "" ; ?> value='u'>Unisexe</option>
      </select>
      <small class="text-danger"><?= $error['genre'] ?? ''; ?></small>
    </div>
    <div class="form-group">
      <label for="type" class="form-label mt-4">Type</label>
      <select class="form-select" id="type" name="type">
      <option class="text-center" value="">---Selectionnez un type---</option>
        <option <?= (isset($_POST['type']) && $_POST['type'] == 't-shirt')? "selected" : "" ; ?> value="t-shirt">t-shirt</option>
        <option <?= (isset($_POST['type']) && $_POST['type'] == 'pantalon')? "selected" : "" ; ?> value="pantalon">pantalon</option>
        <option <?= (isset($_POST['type']) && $_POST['type'] == 'chaussure')? "selected" : "" ; ?> value='chaussure'>chaussure</option>
      </select>
      <small class="text-danger"><?= $error['type'] ?? ''; ?></small>
    </div>
    <div class="form-group">
      <label for="prix" class="form-label mt-4">Prix</label>
      <input class="form-control" type="number" min="0" step="0.01" id="prix" name="prix" value="<?= $_POST['prix'] ?? ''; ?>">
      <small class="text-danger"><?= $error['prix'] ?? ''; ?></small>
    </div>
    
    <button type="submit" class="btn btn-primary">ajout produit</button>
  </fieldset>
</form>
</div>

<?php require_once('../inclusion/footer.inc.php'); ?>
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
        <?php foreach($produits as $produit ): ?>
        <div class="col-4 px-3">
        <div class="card text-white bg-primary mb-3" >
            <div class="card-header">Header</div>
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