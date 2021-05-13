<?php 
include'bsd.php';
include'index.php';
$date = date("Y-m-d");
?>
<?php 
    if (empty($_SESSION['pseudo'])){

        header ('location: Formulaire.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Valider une activité</title>
	<link rel="stylesheet" type="text/css" href="style.css">
  <script src="script.js"></script>
</head>
<body>
	<div class="container">
	<h1>Validation d'une activité</h1>
	<form method="post" action="validationActivite.php">
  <div class="form">
    <label for="date">Selectionner la date </label>
    <input type="date" value="<?php echo $date ?>" name="date"><br/>
    <label for="elevesValidatActi">Sélectionner l'Eleve</label><br />
            <select class="custom-select custom-select-md lg-3" name="elevesValidatActi" id="elevesValidatActi">
            <?php
 
$reponse = $bdd->query('SELECT * FROM eleves ORDER BY eleveCycle');
 
while ($donnees = $reponse->fetch())
{
?>
           <option value="<?php echo $donnees['eleveNom']?>"> <?php echo $donnees['eleveNom'] . "  " . $donnees['elevePrenom'] . " - " . "Cycle " . $donnees['eleveCycle'];?>
            
           </option>
<?php
};
 
?>
</select><br /></div>
	<div class="form">
			<label for="activite">Sélectionner l'Activité</label><br />
            <select class="showActivite custom-select custom-select-md lg-3" name="activite" id="activite">
            </select>
<br /></div>


<div id="result"></div>
<?php
$reponse->closeCursor();
?>
<div class="form">
<button type="submit" class="btn btn-primary">Valider l'activité !</button>
<a class="btn btn-secondary" href="index.php">Accueil</a>
</div>
</form>
</div>
</body>
</html>
<?php include'footer.php'; ?>