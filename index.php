<?php 
include 'bsd.php';
session_start ();
?>
<?php 
    if (empty($_SESSION['pseudo'])){

        header ('location: Formulaire.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Accueil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="Description" content="Application web de gestion educative">
    <meta http-equiv="content-language" content="fr"/>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Crete+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

</head>

<body>
    <div>
       <img src="img/bandeau.jpg" class="img-fluid" alt="Responsive image">

    </div>
<header class="header" style="background-color: #2E9695;">
<h1 class="title">- Logiciel de suivi des apprentissages -</h1>

</header>
    <nav class="fondnav nav nav-pills flex-column flex-sm-row" style="background-color:#46BC9A">
        <a class="flex-sm-fill text-sm-center nav-link " href="validation.php"><i class="fa fa-check"></i> Valider une attente fondamentale</a>
        <a class="flex-sm-fill text-sm-center nav-link " href="validation2.php"><i class="fa fa-check-square"></i> Valider une activité</a>
        <a class="flex-sm-fill text-sm-center nav-link" href="Activite2.php"><i class="fa fa-list"></i> Activités</a>
        <a class="flex-sm-fill text-sm-center nav-link" href="listing.php"><i class="fa fa-users"></i> Elèves</a>
        <a class="flex-sm-fill text-sm-center nav-link" href="disconnect.php"><i class="fa fa-user"></i> [<?php echo $_SESSION['Prenom'];?>] Se Deconnecter <i class="fa fa-times"></i></a>
</nav>
</body>
</html>