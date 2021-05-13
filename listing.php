<?php
include 'bsd.php';
?>
<?php include 'index.php';
?>
<?php 
    if (empty($_SESSION['pseudo'])){

        header ('location: Formulaire.php');
    }
?>

<?php
if (isset($_POST["modifier"])){
$dateNaissance = $_POST['dateNaissance'];
$anneeJour = date('Y');
$date_explosee = explode("-", $dateNaissance);

$annee = $date_explosee[0];
$mois = $date_explosee[1];
$jour = $date_explosee[2];
$age = $anneeJour - $annee;

if ($age < 8) {
  $eleveCycle = 1;
}else{
  $eleveCycle = 2;
}

$req = $bdd->prepare('UPDATE eleves SET eleveNom = :nom, elevePrenom = :prenom , eleveDatedeNaissance = :dateNaissance , eleveCycle = :eleveCycle WHERE eleveID = :ancien');
$req->execute(array(
  'nom' => $_POST['nom'],
  'prenom' => $_POST['prenom'],
  'dateNaissance' => $_POST['dateNaissance'],
  'ancien' => $_POST['eleveID'],
  'eleveCycle' => $eleveCycle
  ));
echo "Les données sont bien modifiées !" ;
            };?>

<!DOCTYPE html>
<html>
<head>
	<title>Listing des élèves</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Crete+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js""></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js"></script>
    <script src="stupidtable.min.js"></script>
</head>
<body>
    <div class="container-fluid">
    <div class="container">
	<h1>Liste des élèves</h1>
    <br/>
    <div class="row rowbutton">
    <a href="eleve.php" class="btn btn-success"><i class="fa fa-plus-circle"></i> Ajouter un élève</a>
    </div>
    <table class="table table-striped" id="myTable">
  <thead>
    <tr>
      <th data-sort="string" scope="col">Nom</th>
      <th data-sort="string" scope="col">Prénom</th>
      <th data-sort="int" scope="col">Cycle <i class="fa fa-sort"></i></th>
      <th scope="col" colspan="4">Actions</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <?php
        $reponse = $bdd->query('SELECT * FROM eleves');
 
        while($donnees = $reponse->fetch())
        {?>
    <tr>
        <td><?php echo $donnees['eleveNom'];?></td>
        <td><?php echo $donnees['elevePrenom'];?></td>
        <td><?php echo $donnees['eleveCycle'];?></td>
        <?php echo "<td><a class='eleveaction btn-dark btn-sm' href='Progress.php?elevePrenom=".$donnees['elevePrenom']."&"."eleveNom=".$donnees['eleveNom']."&"."eleveCycle=".$donnees['eleveCycle']."'> Bilan </a></td>";?>
        <?php echo "<td><a class='eleveaction btn-info btn-sm' href='modifEleve.php?eleveID=".$donnees['eleveID']."'> Modifier </a></td>";?>
        <?php echo "<td><a class='eleveaction btn-warning btn-sm' href='dupliquer.php?eleveID=".$donnees['eleveID']."'> Dupliquer </a></td>";?>
        <?php echo "<td><button type='button' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#message". $donnees['eleveID']."'> Supprimer</button></td>";?>
 </tr>
 
 <div id="message<?php echo $donnees['eleveID'];?>" class="modal fade" role="dialog">
      <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Suppression</h4>
      </div>
      <div class="modal-body">
        <p>Voulez-vous supprimer cette activité ?</p>
        <?php echo $donnees['eleveID']. ' - '.$donnees['eleveNom'];?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
        <?php echo "<a class='delete btn-danger btn-sm' href='delete.php?eleveID=".$donnees['eleveID']."&"."eleveNom=".$donnees['eleveNom']."'> Supprimer </a>";?>
      </div>
    </div>

  </div>
</div>
  </div>
        <?php
        }
        $reponse->closeCursor();
        ?>
    </tr>
  </tbody>
</table>

</div>
</div>
<?php include 'footer.php'; ?>
</html>

  <script>
   $(document).ready(function($) { 
    $("#myTable").stupidtable();
   }); 
  </script>  

