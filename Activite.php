<?php 
include 'bsd.php';
include 'index.php';

    if (empty($_SESSION['pseudo'])){

        header ('location: Formulaire.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Création d'une activité</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  
</head>
<body>
  <h2>Création d'une activité</h2>
  <form method="post" action="Activite1.php">
    <div class="container">
    <div class="contenu">
    <div class="form">

      <p>Selectionner le niveau de l'activité : </p>

    <div>
      <input type="radio" class="testcycle" id="cycle1" name="cycle" value="1">
      <label for="cycle1">Cycle 1</label>
      <input type="radio" class="testcycle" id="cycle2" name="cycle" value="2">
      <label for="cycle2">Cycle 2</label>
    </div>
    <br/>
         <label for="activiteNom">Nom de l'Activité</label>
            <br />
            <input type="text" id="activiteNom" name="activiteNom" style="width: 800px;" /><br />

   <div class="form">
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
        <option value="0" selected="selected">Sélectionner le cours</option>
       </select>
    </div>
      <div>
       <select class="custom-select custom-select-md lg-3" name="matiere" id="matiere">
        <option value="0">Sélectionner la matiere</option>
       </select>
    </div>

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

     <button type="button" class="btn btn-primary" id="button">Ajouter l'attente !</button>

   </div>
      <div class="row">
        <div id="activite1" name="activite1" class="acti col-sm alert alert-success" role="alert"></div><br/>
        <div id="activite2" name="activite2" class="acti col-sm alert alert-danger" role="alert"></div><br/>
        <div id="activite3" name="activite3" class="acti col-sm alert alert-warning" role="alert"></div><br/>
        <div id="activite4" name="activite4" class="acti col-sm alert alert-success" role="alert"></div><br/>
        <div id="activite5" name="activite5" class="acti col-sm alert alert-danger" role="alert"></div><br/>
     </div>
       <div class="row">
        <div id="activite6" name="activite6" class="acti col-sm alert alert-success" role="alert"></div><br/>
        <div id="activite7" name="activite7" class="acti col-sm alert alert-danger" role="alert"></div><br/>
        <div id="activite8" name="activite8" class="acti col-sm alert alert-warning" role="alert"></div><br/>
        <div id="activite9" name="activite9" class="acti col-sm alert alert-success" role="alert"></div><br/>
        <div id="activite10" name="activite10" class="acti col-sm alert alert-danger" role="alert"></div><br/>
      <div class="form">
           <label for=comments>Commentaires</label>
           <textarea name="comments" id="comments" rows="6" cols="145" ></textarea>
       </div>
           <input type="submit"  class="btn btn-success" value="Créer l'activité !">
  </form>
  </div>
</div>
</div>
</body>
      
<?php include 'footer.php';?>
<script src="script.js"></script>
</html>
