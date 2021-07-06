<?php

include 'index.php';
 
?>
<?php 
    if (empty($_SESSION['pseudo'])){

        header ('location: Formulaire.php');
    }
?>
    <!DOCTYPE html>
    <html>
    <head>
    	<title>Ajout d'un Elève</title>
    </head>
    <body>
    		<div class="container-fluid">
            <div class="container">
            <h1 class="titleajout" style="text-align: center;">Ajout d'un élève</h1>
        <form action="eleve1.php" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nom">Nom de l'élève</label>
      <input type="text" class="form-control" id="nom" name="nom" placeholder="Insérer le nom">
    </div>
    <div class="form-group col-md-6">
      <label for="prenom">Prénom de l'élève</label>
      <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Inserer le prénom">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="DatedeNaissance">Date de naissance de l'élève</label>
      <input type="date" class="form-control" id="DatedeNaissance" name="date_de_naissance">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Ajouter l'élève !</button>
</form>
         </div>
        </div>
        <?php include 'footer.php'; ?>
    </body>
    </html>