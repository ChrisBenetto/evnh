<?php
include 'bsd.php';
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
	<title>Progression de l'élève</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Crete+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<body>
<a class="btn btn-light" href="listing.php"><i class="fa fa-arrow-left"></i> Retour </a>
  
  

    <div class="container">
    <div class="select">
	<h1>Progression des élèves</h1>
        

<?php
$eleveNom = $_GET['eleveNom'];
$elevePrenom = $_GET['elevePrenom'];
$eleveCycle = $_GET['eleveCycle'];


$query = $bdd->query("SELECT COUNT(*)AS TotalFrancais FROM attentes_fondamentales WHERE matieresID = 'Francais' AND Cycle = '$eleveCycle'");
$count = $query->fetch(PDO::FETCH_ASSOC);
$queryAn = $bdd->query("SELECT COUNT(*)AS TotalAnglais FROM attentes_fondamentales WHERE matieresID = 'Anglais' AND Cycle = '$eleveCycle'");
$countAn = $queryAn->fetch(PDO::FETCH_ASSOC);
$queryAl = $bdd->query("SELECT COUNT(*)AS TotalAllemand FROM attentes_fondamentales WHERE matieresID = 'Allemand' AND Cycle = '$eleveCycle'");
$countAl = $queryAl->fetch(PDO::FETCH_ASSOC);
$queryMa = $bdd->query("SELECT COUNT(*)AS TotalMathematiques FROM attentes_fondamentales WHERE matieresID = 'Mathematiques' AND Cycle = '$eleveCycle'");
$countMa = $queryMa->fetch(PDO::FETCH_ASSOC);
$querySc = $bdd->query("SELECT COUNT(*)AS TotalSciences FROM attentes_fondamentales WHERE matieresID = 'Sciences de la nature' AND Cycle = '$eleveCycle'");
$countSc = $querySc->fetch(PDO::FETCH_ASSOC);
$queryHi = $bdd->query("SELECT COUNT(*)AS TotalHistoire FROM attentes_fondamentales WHERE matieresID = 'Histoire' AND Cycle = '$eleveCycle'");
$countHi = $queryHi->fetch(PDO::FETCH_ASSOC);
$queryGeo = $bdd->query("SELECT COUNT(*)AS TotalGeographie FROM attentes_fondamentales WHERE matieresID = 'Geographie' AND Cycle = '$eleveCycle'");
$countGeo = $queryGeo->fetch(PDO::FETCH_ASSOC);
$queryCi = $bdd->query("SELECT COUNT(*)AS TotalCitoyennete FROM attentes_fondamentales WHERE matieresID = 'Citoyenneté' AND Cycle = '$eleveCycle'");
$countCi = $queryCi->fetch(PDO::FETCH_ASSOC);
$queryAc = $bdd->query("SELECT COUNT(*)AS TotalActicrea FROM attentes_fondamentales WHERE matieresID = 'Activites creatrices et manuelles' AND Cycle = '$eleveCycle'");
$countAc = $queryAc->fetch(PDO::FETCH_ASSOC);
$queryAv = $bdd->query("SELECT COUNT(*)AS TotalArtsVisu FROM attentes_fondamentales WHERE matieresID = 'Arts Visuels' AND Cycle = '$eleveCycle'");
$countAv = $queryAv->fetch(PDO::FETCH_ASSOC);
$queryMu = $bdd->query("SELECT COUNT(*)AS TotalMusique FROM attentes_fondamentales WHERE matieresID = 'Musique' AND Cycle = '$eleveCycle'");
$countMu = $queryMu->fetch(PDO::FETCH_ASSOC);
$queryEps = $bdd->query("SELECT COUNT(*)AS TotalEducationPhysique FROM attentes_fondamentales WHERE matieresID = 'Education physique' AND Cycle = '$eleveCycle'");
$countEps = $queryEps->fetch(PDO::FETCH_ASSOC);
$queryEn = $bdd->query("SELECT COUNT(*)AS TotalEducNutri FROM attentes_fondamentales WHERE matieresID = 'Education nutritionnelle' AND Cycle = '$eleveCycle'");
$countEn = $queryEn->fetch(PDO::FETCH_ASSOC);


$queryMitic = $bdd->query("SELECT COUNT(*)AS TotalMitic FROM attentes_fondamentales WHERE Cours = 'MITIC' AND Cycle = '$eleveCycle'");
$countMitic = $queryMitic->fetch(PDO::FETCH_ASSOC);

$querySante = $bdd->query("SELECT COUNT(*)AS TotalSante FROM attentes_fondamentales WHERE Cours = 'Santé et bien-être' AND Cycle = '$eleveCycle'");
$countSante = $querySante->fetch(PDO::FETCH_ASSOC);

$queryChoix = $bdd->query("SELECT COUNT(*)AS TotalChoix FROM attentes_fondamentales WHERE Cours = 'Choix et projets personnels' AND Cycle = '$eleveCycle'");
$countChoix = $queryChoix->fetch(PDO::FETCH_ASSOC);


$queryProjetco = $bdd->query("SELECT COUNT(*)AS TotalProjetco FROM attentes_fondamentales WHERE Cours = 'Projets collectifs et Vie de la classe et de l’école' AND Cycle = '$eleveCycle'");
$countProjetco = $queryProjetco->fetch(PDO::FETCH_ASSOC);

$queryEnvi = $bdd->query("SELECT COUNT(*)AS TotalEnvi FROM attentes_fondamentales WHERE Cours = 'Environnement et Complexité et interdépendance' AND Cycle = '$eleveCycle'");
$countEnvi = $queryEnvi->fetch(PDO::FETCH_ASSOC);

$queryIden = $bdd->query("SELECT COUNT(*)AS TotalIden FROM attentes_fondamentales WHERE Cours = 'Identité' AND Cycle = '$eleveCycle'");
$countIden = $queryIden->fetch(PDO::FETCH_ASSOC);

$querySocial = $bdd->query("SELECT COUNT(*)AS TotalSocial FROM attentes_fondamentales WHERE Cours = 'Sociales' AND Cycle = '$eleveCycle'");
$countSocial = $querySocial->fetch(PDO::FETCH_ASSOC);

$queryIndiv = $bdd->query("SELECT COUNT(*)AS TotalIndiv FROM attentes_fondamentales WHERE Cours = 'Individuelles' AND Cycle = '$eleveCycle'");
$countIndiv = $queryIndiv->fetch(PDO::FETCH_ASSOC);

$queryGe = $bdd->query("SELECT COUNT(*)AS TotalGeneral FROM attentes_fondamentales WHERE Cycle = '$eleveCycle'");
$countGe = $queryGe->fetch(PDO::FETCH_ASSOC);

$reponse2 = $bdd->query("SELECT * FROM progression WHERE eleveNom= '$eleveNom' AND elevePrenom='$elevePrenom'");
while ($donnees = $reponse2->fetch())
    { ?>

        <h2><?php echo $donnees['eleveNom'] . " " . $donnees['elevePrenom']; ?></h2><br/>
        <div class='row rowbutton'>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="btn btn-info nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><i class="fa fa-graduation-cap"></i> Progression</a>
                </li>
                <li class="nav-item">
                    <a class=" btn btn-success nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="fa fa-thumbs-up"></i> Attentes validées</a>
                </li>
                <li class="nav-item">
                    <a class=" btn btn-warning nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false"><i class="fa fa-book"></i> Attentes travaillées</a>
                </li>
                <li class="nav-item">
                    <a class=" btn btn-dark nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-activite" role="tab" aria-controls="pills-activite" aria-selected="false"><i class="fa fa-book"></i> Activités pratiquées</a>
                </li>
        </ul>
        </div>
        <?php echo "<a href='bilanEleve.php?elevePrenom=".$donnees['elevePrenom']."&"."eleveNom=".$donnees['eleveNom']."&"."eleveCycle=".$donnees['eleveCycle']."'> PDF Bilan de l'élève </a></td>";?>
        <h1>Domaines disciplinaires</h1>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="row">
                            <div class="card text-white bg-warning col-sm card;">
                                <div class="card-header">Langues</div>
                                    <div class="card-body">
                                        <h5 class="card-title">Français</h5>
                                        <p><?php echo "Attentes validées:"." ". $donnees['niveauFrancais']." / ". $count['TotalFrancais'];?></p>
                                        

                                    </div>
                            </div>
                        <div class="card text-white bg-warning col-sm card;">
                            <div class="card-header">Langues</div>
                                <div class="card-body">
                                    <h5 class="card-title">Anglais</h5>
                                    <p class="card-text"><?php echo "Attentes validées:"." ". $donnees['niveauAnglais']." / ". $countAn['TotalAnglais'];?></p>
                                    
                                </div>
                        </div>
                        <div class="card text-white bg-warning col-sm card ;">
                            <div class="card-header">Langues</div>
                                <div class="card-body">
                                    <h5 class="card-title">Allemand</h5>
                                
                                    <p><?php echo "Attentes validées:"." ". $donnees['niveauAllemand']." / ". $countAl['TotalAllemand'];?></p>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card text-white bg-danger col-sm card;">
                            <div class="card-header">Mathématiques et Sciences</div>
                                <div class="card-body">
                                    <h5 class="card-title">Mathématiques</h5>
                                    
                                    <p><?php echo "Attentes validées:"." ". $donnees['niveauMathematiques']." / ". $countMa['TotalMathematiques'];?></p>
                                </div>
                        </div>
                        <div class="card text-white bg-danger col-sm card;">
                            <div class="card-header">Mathématiques et Sciences</div>
                                <div class="card-body">
                                    <h5 class="card-title">Sciences de la Nature</h5>
                                    
                                    <p><?php echo "Attentes validées:"." ". $donnees['niveauScienceNature']." / ". $countSc['TotalSciences'];?></p>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card text-white bg-success col-sm card;">
                            <div class="card-header">Sciences humaines et sociales</div>
                                <div class="card-body">
                                    <h5 class="card-title">Histoire</h5>
                                    
                                    <p><?php echo "Attentes validées:"." ". $donnees['niveauHistoire']." / ". $countHi['TotalHistoire'];?></p>
                                </div>
                        </div>
                        <div class="card text-white bg-success col-sm card;">
                            <div class="card-header">Sciences humaines et sociales</div>
                                <div class="card-body">
                                    <h5 class="card-title">Géographie</h5>
                                    
                                    <p><?php echo "Attentes validées:"." ". $donnees['niveauGeographie']." / ". $countGeo['TotalGeographie'];?></p>
                                </div>
                        </div>
                        <div class="card text-white bg-success col-sm card ;">
                            <div class="card-header">Sciences humaines et sociales</div>
                                <div class="card-body">
                                    <h5 class="card-title">Citoyenneté</h5>
                                    
                                    <p><?php echo "Attentes validées:"." ". $donnees['niveauCitoyennete']." / ". $countCi['TotalCitoyennete'];?></p>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card text-black col-sm card;">
                            <div class="card-header">Arts</div>
                                <div class="card-body text-white orange">
                                    <h5 class="card-title">Activités créatrices et manuelles</h5>
                                    
                                    <p><?php echo "Attentes validées:"." ". $donnees['niveauActivitescrea']." / ". $countAc['TotalActicrea'];?></p>
                                </div>
                        </div>
                        <div class="card col-sm  card;">
                            <div class="card-header text-black">Arts</div>
                                <div class="card-body text-white  orange ">
                                    <h5 class="card-title">Arts Visuels</h5>
                                    
                                    <p><?php echo "Attentes validées:"." ". $donnees['niveauArtsVisu']." / ". $countAv['TotalArtsVisu'];?></p>
                                </div>
                        </div>
                        <div class="card text-black  col-sm card ;">
                            <div class="card-header">Arts</div>
                                <div class="card-body text-white orange">
                                    <h5 class="card-title">Musique</h5>
                                    
                                    <p><?php echo "Attentes validées:"." ". $donnees['niveauMusique']." / ". $countMu['TotalMusique'];?></p>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card text-white bg-primary col-sm card;">
                            <div class="card-header">Corps et mouvement</div>
                                <div class="card-body">
                                    <h5 class="card-title">Education physique</h5>
                                    
                                    <p><?php echo "Attentes validées:"." ". $donnees['niveauEducPhysique']." / ". $countEps['TotalEducationPhysique'];?></p>
                                </div>
                        </div>
                        <div class="card text-white bg-primary col-sm card;">
                            <div class="card-header">Corps et mouvement</div>
                                <div class="card-body">
                                    <h5 class="card-title">Education nutritionelle</h5>
                                    
                                    <p><?php echo "Attentes validées:"." ". $donnees['niveauEducNutri']." / ". $countEn['TotalEducNutri'];?></p>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card text-white bg-dark col-sm card;">
                            <div class="card-header">Niveau Général</div>
                                <div class="card-body">
                                    <h5 class="card-title">Cycle <?php echo $donnees['eleveCycle'] ?></h5>
                                    
                                    <p><?php echo "Attentes validées:"." ". $donnees['niveauGeneral']." / ". $countGe['TotalGeneral'];?></p>
                                </div>
                        </div>
                    </div>
                    <hr>
                    <br>
                    <h1>Formation générale</h1>
                    <div class="row">
                        <div class="card text-white bg-success col-sm card;">
                            <div class="card-header">Formation générale</div>
                                <div class="card-body">
                                    <h5 class="card-title">MITIC</h5>
                                    
                                    <p><?php echo "Attentes validées:"." ". $donnees['niveauMitic']." / ". $countMitic['TotalMitic'];?></p>
                                </div>
                        </div>
                        <div class="card text-white bg-success col-sm card;">
                            <div class="card-header">Formation générale</div>
                                <div class="card-body">
                                    <h5 class="card-title">Santé et bien-être</h5>
                                    
                                    <p><?php echo "Attentes validées:"." ". $donnees['niveauSante']." / ". $countSante['TotalSante'];?></p>
                                </div>
                        </div>
                        <div class="card text-white bg-success col-sm card ;">
                            <div class="card-header">Formation générale</div>
                                <div class="card-body">
                                    <h5 class="card-title">Choix et projets personnels</h5>
                                    
                                    <p><?php echo "Attentes validées:"." ". $donnees['niveauChoix']." / ". $countChoix['TotalChoix'];?></p>
                                </div>
                        </div>
                        <div class="card text-white bg-success col-sm card ;">
                            <div class="card-header">Formation générale</div>
                                <div class="card-body">
                                    <h5 class="card-title">Projets collectifs et Vie de la classe et de l’éco...</h5>

                                    <p><?php echo "Attentes validées:"." ". $donnees['niveauProjetco']." / ". $countProjetco['TotalProjetco'];?></p>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card text-white bg-success col-sm card;">
                            <div class="card-header">Formation générale</div>
                                <div class="card-body">
                                    <h5 class="card-title">Environnement et Complexité et interdépendance</h5>
                                    
                                    <p><?php echo "Attentes validées:"." ". $donnees['niveauEnvi']." / ". $countEnvi['TotalEnvi'];?></p>
                                </div>
                        </div>
                        <div class="card text-white bg-success col-sm card;">
                            <div class="card-header">Formation générale</div>
                                <div class="card-body">
                                    <h5 class="card-title">Identité</h5>
                                    
                                    <p><?php echo "Attentes validées:"." ". $donnees['niveauIden']." / ". $countIden['TotalIden'];?></p>
                                </div>
                        </div>
                    </div>
                    <hr>
                    <br>
                    <h1>Capacités transversales</h1>
                     <div class="row">
                        <div class="card text-white bg-primary col-sm card;">
                            <div class="card-header">Capacités transversales</div>
                                <div class="card-body">
                                    <h5 class="card-title">Sociales</h5>
                                    
                                    <p><?php echo "Attentes validées:"." ". $donnees['niveauSocial']." / ". $countSocial['TotalSocial'];?></p>
                                </div>
                        </div>
                        <div class="card text-white bg-primary col-sm card;">
                            <div class="card-header">Capacités transversales</div>
                                <div class="card-body">
                                    <h5 class="card-title">Individuelles</h5>
                                    
                                    <p><?php echo "Attentes validées:"." ". $donnees['niveauIndi']." / ". $countIndiv['TotalIndiv'];?></p>
                                </div>
                        </div>
                    </div>
            </div>
            

<?php };?>
<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
    <div class="container">

        <h2 style="text-align: center;">Attentes fondamentales validées</h2>


       <?php
    $eleveNom = $_GET['eleveNom'];
    $elevePrenom = $_GET['elevePrenom']; 
       $reponse2 = $bdd->query("SELECT * FROM attentessucess WHERE eleveNom = '$eleveNom' ORDER BY attentesID");
while ($donnees = $reponse2->fetch()){
    echo $donnees['attentesID'] . '->' .$donnees['attentesNom']/* . ' : ' . ' Validation le : ' . $donnees['dateSucess'] . " "*/ .  "<br/>" ;}

     ?>
    </div>
<?php 
$reponse2->closeCursor();?>
</div>


<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
    <div class="container">
        <h2 style="text-align: center;">Attentes fondamentales travaillées</h2>
        
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Date de travail</th>
      <th scope="col">nom de l'attente</th>
      <th scope="col">essai</th>
      <th scope="col">Commentaires</th>
      <th scope="col">Encadrant</th>
      <th scope="col">Activité</th>
      <th colspan="2">Actions</th>
    </tr>
  </thead>
  <tbody>

    <tr>
            <?php $reponse3 = $bdd->query("SELECT * FROM attenteswork WHERE eleveNom = '$eleveNom' AND attentesNom != 'Aucune' ORDER BY essai DESC");
while ($donnees = $reponse3->fetch()){?>
        <td><?php echo $donnees['datework'];?></td>
        <td><?php echo $donnees['attentesNom'];?></td>
        <td><?php echo $donnees['essai'];?></td>
        <td><?php echo $donnees['comments'];?></td>
        <td><?php echo $donnees['encadrant'];?></td>
        <td><?php echo $donnees['activiteID'];?></td>
        <?php echo "<td><a class='btn-sucess btn-sm validationAttentesFond' href='validProgress.php?attentesNom=".$donnees['attentesNom']."&"."eleveNom=".$donnees['eleveNom']."&"."eleveCycle=".$eleveCycle."&"."elevePrenom=".$elevePrenom."'><i class='fa fa-check'></i></a></td>";?>
        <?php echo "<td><a class='btn-danger btn-sm' href='deleteProgress.php?attentesNom=".$donnees['attentesNom']."&"."eleveNom=".$donnees['eleveNom']."'><i class='fa fa-trash'></i></a></td>";?>
    </tr>
    <?php    };
 $reponse3->closeCursor(); ?>
  </tbody>
</table>


    </div>
    </div>

    <div class="tab-pane fade" id="pills-activite" role="tabpanel" aria-labelledby="pills-activite-tab">
    <div class="container">
        <h2 style="text-align: center;">Activités pratiquées</h2>
        
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Date de travail</th>
      <th scope="col">Nom de l'activité</th>
    </tr>
  </thead>
  <tbody>

    <tr>
            <?php $reponse4 = $bdd->query("SELECT * FROM activitedone WHERE eleveNom = '$eleveNom' ORDER BY datework ASC");
while ($donnees = $reponse4->fetch()){?>
        <td><?php echo $donnees['datework'];?></td>
        <td><?php echo $donnees['activiteNom'];?></td>
    </tr>
    <?php    };
 $reponse4->closeCursor(); ?>
  </tbody>
</table>


    </div>
    </div>
    </div>
    
</div>
</body>
<?php include 'footer.php';?>
</html>
