<?php 
include "bsd.php";
include "index.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Modification d'un élève</title>
</head>
<body>
	<div class="container">
<?php 
$eleveID = $_GET['eleveID'];
$rep = $bdd->query("SELECT * FROM eleves WHERE eleveID = '$eleveID'");	
while ($don = $rep->fetch())
{?>
	
	<h1>Modification d'un élève</h1>
<form method="post" action="listing.php">
	
    <div class="form-group col-md-6">
      <label for="nom">Nom de l'élève</label>
      <input type="text" class="form-control" id="nom" name="nom" value= <?php echo $don['eleveNom'] ;?>>
    </div>
    <div class="form-group col-md-6">
      <label for="nom">Prenom de l'élève</label>
      <input type="text" class="form-control" id="prenom" name="prenom" value= <?php echo $don['elevePrenom'] ;?>>
    </div>
     <div class="form-group col-md-6">
      <label for="nom">Date de naissance</label>
      <input type="text" class="form-control" id="dateNaissance" name="dateNaissance" value= <?php echo $don['eleveDatedeNaissance'] ;?>>
    </div>
    

<?php };?>
	<input type="hidden" id="eleveID" name="eleveID" class="eleveID" value=<?php echo $_GET['eleveID']; ?>>
    <input type="submit" name="modifier" class="btn btn-primary" value="Modifier !"/>
    </form>
   </div>
</body>
</html>