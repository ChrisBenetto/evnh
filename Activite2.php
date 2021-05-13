<?php
include 'bsd.php';
include 'index.php';

    if (empty($_SESSION['pseudo'])){

        header ('location: Formulaire.php');
    }
?>

<?php if (isset($_POST["modifier2"])){

  $req = $bdd->prepare('UPDATE activite SET activiteNom = :activiteNom, activiteAttente1 = :activiteAttente1, activiteAttente2 = :activiteAttente2 , activiteAttente3 = :activiteAttente3 ,activiteAttente4 = :activiteAttente4, activiteAttente5 = :activiteAttente5 , activiteAttente6 = :activiteAttente6 ,activiteAttente7 = :activiteAttente7, activiteAttente8 = :activiteAttente8, activiteAttente9 = :activiteAttente9 ,activiteAttente10 = :activiteAttente10 , activiteComment = :activiteComment WHERE activiteID = :activiteID');
$req->execute(array(
  'activiteNom' => $_POST['activiteNom'],
  'activiteAttente1' => $_POST['activiteAttente1'],
  'activiteAttente2' => $_POST['activiteAttente2'],
  'activiteAttente3' => $_POST['activiteAttente3'],
  'activiteAttente4' => $_POST['activiteAttente4'],
  'activiteAttente5' => $_POST['activiteAttente5'],
  'activiteAttente6' => $_POST['activiteAttente6'],
  'activiteAttente7' => $_POST['activiteAttente7'],
  'activiteAttente8' => $_POST['activiteAttente8'],
  'activiteAttente9' => $_POST['activiteAttente9'],
  'activiteAttente10' => $_POST['activiteAttente10'],
  'activiteComment' => $_POST['activiteComment'],
  'activiteID' => $_POST['activiteID']
  ));
echo "Les données sont bien modifiées !" ;
            };?>


<!DOCTYPE html>
<html>
<head>
	<title>Listing des activités</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Crete+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="script.js"></script>
</head>
<body>
    
<div class="container-fluid">
    <div class="container">
    <h1>Activités</h1>
    <p>( Cliquer sur une attente pour avoir plus d'informations , cliquer sur l'information pour l'enlever )
    <nav id="actiMenu" class="navbar navbar-default">
    <a href="Activite.php" class="btn btn-success"><i class="fa fa-plus-circle"></i> Ajouter une activité</a>
    <button type="submit" id="searchAttentes"  data-toggle="modal" data-target="#exampleModal" class="btn btn-info"><i class="fa fa-eye"></i> Activité par attente </button>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sélectionner l'attente fondamentale</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form">
          <div id="ajaxSearch" class="alert alert-primary" role="alert"></div>
          <p>Sélectionner l'attente fondamentale afin de connaître les activités correspondantes</p>
        <div>
          <input type="radio" class="testcycle" id="cycle1" name="cycle" value="1">
          <label for="cycle1">Cycle 1</label>
          <input type="radio" class="testcycle" id="cycle2" name="cycle" value="2">
          <label for="cycle2">Cycle 2</label>
        </div>
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
   </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <button type="button" id="rechercheActi" class="btn btn-primary">Voir les Activités</button>
        
      </div>
  </div>
</div>
    </nav>
    <div id="search"></div> 
    </div>
    
    <br/>
  <div class="container">
        <?php
        $reponse = $bdd->query('SELECT * FROM activite ORDER BY activiteNom ASC');
 
        while($donnees = $reponse->fetch())
        {?>
        <div class="card text-center">
          <div class="card-header">
            <?php echo $donnees['activiteNom'];?>
          </div>
          <div class="card-body">
              <h5 class="card-title"><?php echo $donnees['activiteComment'];?></h5>
              
              <p class="activiteAttente"><?php echo substr($donnees['activiteAttente1'],0,150).'<br/>';?></p> 
              <p class="activiteAttente"><?php echo substr($donnees['activiteAttente2'],0,150).'<br/>';?></p>
              <p class="activiteAttente"><?php echo substr($donnees['activiteAttente3'],0,150).'<br/>';?></p>
              <p class="activiteAttente"><?php echo substr($donnees['activiteAttente4'],0,150).'<br/>';?></p>
              <p class="activiteAttente"><?php echo substr($donnees['activiteAttente5'],0,150).'<br/>';?></p>
              <p class="activiteAttente"><?php echo substr($donnees['activiteAttente6'],0,150).'<br/>';?></p>
              <p class="activiteAttente"><?php echo substr($donnees['activiteAttente7'],0,150).'<br/>';?></p>
              <p class="activiteAttente"><?php echo substr($donnees['activiteAttente8'],0,150).'<br/>';?></p>
              <p class="activiteAttente"><?php echo substr($donnees['activiteAttente9'],0,150).'<br/>';?></p>
              <p class="activiteAttente"><?php echo substr($donnees['activiteAttente10'],0,150).'<br/>';?></p>
              <?php echo "<a class='btn btn-info' href='modifActivite.php?activiteID=".$donnees['activiteID']."&"."activiteNom=".$donnees['activiteNom']."'> Modifier </a>";?>
              <?php echo "<a class='btn btn-warning' href='dupliqueractivite.php?activiteID=".$donnees['activiteID']."'> Dupliquer </a>";?>
              <?php echo "<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#message". $donnees['activiteID']."'> Supprimer</button>";?>
              <div class="infoAttentes"></div>
              <div id="message<?php echo $donnees['activiteID'];?>" class="modal fade" role="dialog">
                <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Suppression</h4>
                </div>
                <div class="modal-body">
                  <p>Voulez-vous supprimer cette activité ?</p>
                  <?php echo $donnees['activiteID']. ' - '.$donnees['activiteNom'];?>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                  <?php echo "<a class='btn btn-danger' href='deleteactivite.php?activiteID=".$donnees['activiteID']."&"."activiteNom=".$donnees['activiteNom']."'> Supprimer </a>";?>
                </div>
          </div>
        </div>
      </div>
            </div>
            <div class="card-footer text-muted">
              Cycle : <?php echo $donnees['activiteLevel'];?>
            </div>
            <br/>
          </div>



        <?php
        }
        $reponse->closeCursor();
        ?>
</div>
</div>
<?php include 'footer.php'; ?>
</html>