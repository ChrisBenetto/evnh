<?php 
include "bsd.php";
include "index.php";
$activiteID = htmlspecialchars($_GET['activiteID']);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Modification d'une activité</title>
  <script src="script.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
</head>
<body>
<div class="container">
<h1>Modification d'une activité </h1>
  <button type="button" data-toggle="modal" data-target="#Modal" class="btn btn-info"><i class="fa fa-eye"></i> Glossaire d'attente </button>
    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Sélectionner l'attente fondamentale</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div id="textAttentes"></div>
        <div class="form">
          
          <p>Sélectionner l'attente fondamentale afin de copier/coller pour modification de votre activité</p>
        <div>
          <input type="radio" class="testcycle" id="cycle1" name="cycle" value="1">
          <label for="cycle1">Cycle 1</label>
          <input type="radio" class="testcycle" id="cycle2" name="cycle" value="2">
          <label for="cycle2">Cycle 2</label>
        </div>
        <select class="custom-select custom-select-md lg-3" name="section" id="section">
        <option value="0">Sélectionner la section </option>
            <?php
 
$reponse1 = $bdd->query('SELECT DISTINCT Section FROM attentes_fondamentales');
 
while ($donnees = $reponse1->fetch())
{
?>
        <option value="<?php echo $donnees['Section']?>"> <?php echo $donnees['Section'];?></option>

           <?php };
?>
       </select>
<?php 
$reponse1->closeCursor();?>
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
                  </div>
                    <div class="modal-footer">
                      <button type="button" id="afficherAttente" class="btn btn-primary">Copier Attente</button>
                    </div>
                </div>
</div>
</div>
</div>
<section class="container">
<form method="post" action="Activite2.php">
<?php $rep = $bdd->query("SELECT * FROM activite WHERE activiteID = '$activiteID'");  
while ($don = $rep->fetch())
{ ?>
   
              <div class="form-group col-md-4">
                <label for="nom">Nom de l'activité</label>
                <input type="text" class="form-control" id="activiteNom" name="activiteNom" value= "<?php echo ($_GET["activiteNom"]);?>">
              </div>
              <div class="form-group col-md-9">
                <input type ="text" class="form-control modifActiv" name ="activiteAttente1" id="activiteAttente1" value ="<?php echo($don['activiteAttente1']) ?>">
              </div>
              <div class="form-group col-md-9">
                <input type ="text" class="form-control modifActiv" name ="activiteAttente2" id="activiteAttente2" value ="<?php echo $don['activiteAttente2']; ?>">
              </div>
              <div class="form-group col-md-9">
                <input type ="text" class="form-control modifActiv" name ="activiteAttente3" id="activiteAttente3" value ="<?php echo $don['activiteAttente3']; ?>">
              </div>
              <div class="form-group col-md-9">
                <input type ="text" class="form-control modifActiv" name ="activiteAttente4" id="activiteAttente4" value ="<?php echo $don['activiteAttente4']; ?>">
              </div>
              <div class="form-group col-md-9">
                <input type ="text" class="form-control modifActiv" name ="activiteAttente5" id="activiteAttente5" value ="<?php echo $don['activiteAttente5']; ?>">
              </div>
              <div class="form-group col-md-9">
                <input type ="text" class="form-control modifActiv" name ="activiteAttente6" id="activiteAttente6" value ="<?php echo $don['activiteAttente6']; ?>">
              </div>
              <div class="form-group col-md-9">
                <input type ="text" class="form-control modifActiv" name ="activiteAttente7" id="activiteAttente7" value ="<?php echo $don['activiteAttente7']; ?>">
              </div>
              <div class="form-group col-md-9">
                <input type ="text" class="form-control modifActiv" name ="activiteAttente8" id="activiteAttente8" value ="<?php echo $don['activiteAttente8']; ?>">
              </div>
              <div class="form-group col-md-9">
                <input type ="text" class="form-control modifActiv" name ="activiteAttente9" id="activiteAttente9" value ="<?php echo $don['activiteAttente9']; ?>">
              </div>
              <div class="form-group col-md-9">
                <input type ="text" class="form-control modifActiv" name ="activiteAttente10" id="activiteAttente10" value ="<?php echo $don['activiteAttente10']; ?>">
              </div>
            <div class="form-group col-md-10">
              <label for="activiteComment">Commentaires</label><br/>
              <textarea name="activiteComment" id="activiteComment" rows="10" cols="145" ><?php echo $don['activiteComment'];?></textarea>
            </div>
            <input type="hidden" id="activiteID" name="activiteID" class="activiteID" value=<?php echo $_GET['activiteID']; ?>>
            <input type="submit" name="modifier2" class="btn btn-primary" value="Modifier !"/>
</form>
</section>
</div>
<?php }; 
$rep->closeCursor();?>
</body>
</html>