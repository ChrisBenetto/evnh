<?php 
include'bsd.php';
include'index.php';
?>
<?php 
    if (empty($_SESSION['pseudo'])){

        header ('location: Formulaire.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Validation d'une attente fondamentale</title>
	<link rel="stylesheet" type="text/css" href="style.css">
  
</head>
<body>
	<h2>Valider une attente fondamentale</h2>
	<form method="post" action="validationAttente.php">
		<section class="container">
		<div class="form">
        <label for="eleves"></label><br />
            <select class="custom-select custom-select-md lg-3" name="eleves" id="eleves">
            <option value="0">Sélectionner un élève</option>
            <?php
 
$reponse = $bdd->query('SELECT * FROM eleves ORDER BY eleveCycle');
 
while ($donnees = $reponse->fetch())
{
?>
           <option value="<?php echo $donnees['eleveNom']?>"> <?php echo $donnees['eleveNom'] . "  " . $donnees['elevePrenom'] . " - " . "Cycle " . $donnees['eleveCycle'];?>
           	
           </option>
           <?php };
          $reponse->closeCursor();?>
           </select>
   </div>

   <div class="form">
        <div>
      <input type="radio" class="testcycle" id="cycle1" name="cycle" value="1">
      <label for="cycle1">Cycle 1</label>
      <input type="radio" class="testcycle" id="cycle2" name="cycle" value="2">
      <label for="cycle2">Cycle 2</label>
    </div>
    <br/>
            <select class="custom-select custom-select-md lg-3" name="section" id="section">
        <option value="0">Sélectionner la section </option>
            <?php
 
$reponse0 = $bdd->query('SELECT DISTINCT Section FROM attentes_fondamentales');
 
while ($donnees = $reponse0->fetch())
{
?>
        <option value="<?php echo $donnees['Section']?>"> <?php echo $donnees['Section'];?></option>

           <?php };
?>
       </select>
<?php 
$reponse0->closeCursor();?>
   </div>
    <div>
       <select class="custom-select custom-select-md lg-3" name="cours" id="cours">
        <option value="0" >Sélectionner le cours</option>
       </select>
    </div>
      <div>
       <select class="custom-select custom-select-md lg-3" name="matiere" id="matiere">
        <option value="0">Sélectionner la matiere</option>
       </select>
    </div>
    <div>
        <select class="custom-select custom-select-md lg-3" name="thematique" id="thematique">
        <option value="0">Sélectionner la thématique</option>

       </select>
   </div>
    <div>
       <select class="custom-select custom-select-md lg-3" name="cible" id="cible">
        <option value="0">Sélectionner la cible</option>
       </select>
    </div>
      <div>
       <select class="custom-select custom-select-md lg-3" name="objectif" id="objectif">
        <option value="0">Sélectionner l'Objectif</option>
       </select>
    </div>
        
    <div>
       <select class="custom-select custom-select-md lg-3" name="attentes" id="attentes">
        <option value="0">Sélectionner l'attente fondamentale</option>
       </select>
      </div>
      <div class="form">
           <label for=comments>Commentaires</label>
           <textarea name="comments" id="comments" rows="10" cols="145" ></textarea>
       </div>
           <input type="submit"  class="btn btn-primary" value="Ajoutez l'attente !">          
	</form>
  </section>
</body>
      
<?php include 'footer.php';?>
<script src="script2.js"></script>
</html>
