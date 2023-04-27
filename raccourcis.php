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
debug($_POST);

if(!empty($_POST))
{
    $error=[];
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

    if(!$error)
    {
        $request = "INSERT INTO produit (titre, marque, matiere, couleur, taille, genre, type, prix) VALUES (:titre, :marque, :matiere, :couleur, :taille, :genre, :type, :prix)";

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

        $_SESSION['messages']['success'][] = 'Votre produit a bien été créé';

        header('location:../');
        exit();

        
    }



}





// ?>
// <h1 class="text-center mt-5">Ajout produit</h1>

// <div class="container mt-3 p-3 border border-light rounded">
// <form class="p-5" method="post">
//   <fieldset>
//     <div class="form-group">
//       <label for="titre" class="col-sm-2 col-form-label">titre</label>
//     <input type="text" class="form-control" id="titre" name="titre" value="<?= $_POST['titre'] ?? ''; ?>">
//     <small class="text-danger"><?= $error['titre'] ?? ''; ?></small>
      
//     </div>

//     <div class="form-group">
//       <label for="marque" class="form-label mt-4">Marque</label>
//       <select class="form-select" id="marque" name="marque">
//         <option class="text-center" value="">---Selectionnez une marque---</option>
//         <option 
//         <?= (isset($_POST['marque']) && $_POST['marque'] == 'adidas')? "selected" : "" ; ?> 
//         value="adidas">Adidas</option>
//         <option
//         <?= (isset($_POST['marque']) && $_POST['marque'] == 'nike')? "selected" : "" ; ?> 
//         value="nike">Nike</option>
//         <option 
//         <?= (isset($_POST['marque']) && $_POST['marque'] == 'maje')? "selected" : "" ; ?> 
//         value='maje'>Maje</option>
//       </select>
//       <small class="text-danger"><?= $error['marque'] ?? ''; ?></small>
//     </div>
//     <div class="form-group">
//       <label for="matiere" class="form-label mt-4">Matière</label>
//       <select class="form-select" id="matiere" name="matiere">
//       <option class="text-center" value="">---Selectionnez une matière---</option>
//         <option value="coton">Coton</option>
//         <option value="synthetique">Synthétique</option>
//         <option value='lin'>Lin</option>
//       </select>
//     </div>
//     <div class="form-group">
//       <label for="couleur" class="form-label mt-4">Couleur</label>
//       <select class="form-select" id="couleur" name="couleur">
//       <option class="text-center" value="">---Selectionnez une couleur---</option>
//         <option value="r">Rouge</option>
//         <option value="g">Vert</option>
//         <option value='b'>Bleu</option>
//       </select>
//     </div>
//     <div class="form-group">
//       <label for="taille" class="form-label mt-4">Taille</label>
//       <select class="form-select" id="taille" name="taille">
//       <option class="text-center" value="">---Selectionnez une taille---</option>
//         <option value="s">Small</option>
//         <option value="m">Medium</option>
//         <option value='l'>Large</option>
//       </select>
//     </div>
//     <div class="form-group">
//       <label for="genre" class="form-label mt-4">Genre</label>
//       <select class="form-select" id="genre" name="genre">
//       <option class="text-center" value="">---Selectionnez un genre---</option>
//         <option value="m">Homme</option>
//         <option value="w">Femme</option>
//         <option value='u'>Unisexe</option>
//       </select>
//     </div>
//     <div class="form-group">
//       <label for="type" class="form-label mt-4">Type</label>
//       <select class="form-select" id="type" name="type">
//       <option class="text-center" value="">---Selectionnez un type---</option>
//         <option value="t-shirt">t-shirt</option>
//         <option value="pantalon">pantalon</option>
//         <option value='chaussure'>chaussure</option>
//       </select>
//     </div>
//     <div class="form-group">
//       <label for="prix" class="form-label mt-4">Prix</label>
//       <input class="form-control" type="number" min="0" step="0.01" id="prix" name="prix">
//     </div>
    
//     <button type="submit" class="btn btn-primary">ajout produit</button>
//   </fieldset>
// </form>
// </div>

// <?php require_once('../inclusion/footer.inc.php'); ?>