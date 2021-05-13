<?php 

include 'bsd.php';
$pseudo = $_POST['pseudo'];
$password = $_POST['password'];

$req = $bdd->query("SELECT Prenom FROM user WHERE pseudo = '$pseudo' AND password = '$password'");
$users = $req->fetch();
$users = $users['Prenom'];

switch ($users) {
	case 'Floriane':
	    session_start();
        $_SESSION['id'] = $users['id'];
        $_SESSION['pseudo'] = $users['pseudo'];
        $_SESSION['Prenom'] = 'Floriane';
        header ('location: index.php');

		break;
	case 'Ludovic':
        session_start();
        $_SESSION['id'] = $users['id'];
        $_SESSION['pseudo'] = $users['pseudo'];
        $_SESSION['Prenom'] = 'Ludovic';
        header ('location: index.php');
		break;
	case 'Emmanuel':
        session_start();
        $_SESSION['id'] = $users['id'];
        $_SESSION['pseudo'] = $users['pseudo'];
        $_SESSION['Prenom'] = 'Emmanuel';
        header ('location: index.php');
		break;
	case 'Joanna':
        session_start();
        $_SESSION['id'] = $users['id'];
        $_SESSION['pseudo'] = $users['pseudo'];
        $_SESSION['Prenom'] = 'Joanna';
        header ('location: index.php');
		break;

	default:
	echo "Identifiants/mot de passe incorrects !";
	header('location:Formulaire.php');

		break;
	}