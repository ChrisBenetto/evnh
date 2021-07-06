<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Page de connexion</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Crete+Round" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js"></script>
    </head>
    <body class="connex" style="background-image: url(img/pencil.jpg); background-size: cover;">
        <div class="container" style=
    "background-color: #2E9695;
    text-align: center;
    opacity: 0.8;
    height: 350px;
    border-style: 1px solid black;
    border-radius: 3px;
    margin-top: 150px;
}">
        <h1>Bienvenue sur le site de L'EVNH</h1>
        <p>Veuillez entrer votre pseudo et votre mot de passe pour obtenir l'accès :</p>
        <form action="login.php" method="post">
  <div class="form-group" style="margin-top: 25px;">
    <label for="pseudo">Pseudo</label>
    <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Entrez votre pseudo">
  </div>
  <div class="form-group">
    <label for="password">Mot de passe</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Entrez votre mot de passe">
  </div>

  <button type="submit" class="btn btn-primary">Connexion</button>
</form>
        </div>
    </body>
</html>
