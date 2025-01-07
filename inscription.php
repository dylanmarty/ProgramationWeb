<?php

//Mise en relation de la base de donnée:
$host = "localhost";
$username = "root";
$password = "";
$base_name = "jeux_videos";

//connexion base de données:
$conn = new PDO("mysql:host=$host;dbname=$base_name", $username, $password);

if (isset($_POST['valider'])) {
    if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $mdp = $_POST['password'];
    }
}

$conn = null;
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Connexion et inscription </title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/bootstrap.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/all.min.css'>

</head>

<body class="bg-light">
    <div class="container ">
        <div class="row mt-5">
            <div class="col-lg-4 bg-white m-auto rounded-top">
                <h2 class="text-center"> Inscription</h2>
                <p class="text-center text-muted lead"> Simple et Rapide </p>

                <form action="">
                    <div class="input-group  mb-3">
                        <span class="input-group-text">
                            <i class="fa fa-user">
                            </i>
                        </span>
                        <input type="text" class="form-control" placeholder="Nom ">
                    </div>
                    <div class="input-group  mb-3">
                        <span class="input-group-text">
                            <i class="fa fa-user">
                            </i>
                        </span>
                        <input type="text" class="form-control" placeholder="Prénom ">
                    </div>
                    <div class="input-group  mb-3">
                        <span class="input-group-text">
                            <i class="fa fa-envelope">
                            </i>
                        </span>
                        <input type="text" class="form-control" placeholder="Email ">
                    </div>
                    <div class="input-group  mb-3">
                        <span class="input-group-text">
                            <i class="fa fa-lock">
                            </i>
                        </span>
                        <input type="text" class="form-control" placeholder="Mot de passe ">
                    </div>
                    <div class="d-grid">
                        <button type="button" class="btn btn-success">S’inscrire</button>
                        <p class="text-center text-muted mt-3">
                            En cliquant sur S’inscrire, vous acceptez nos <a href="#"> Conditions générales</a>, notre <a href=""> Politique de confidentialité </a> et notre <a href="#"> Politique d’utilisation</a> des cookies.
                        </p>
                        <p class="text-center">
                            Avez vous déjà un compte ?<a href="connexion.php"> Connexion </a>
                        </p>
                    </div>
                </form>

            </div>
        </div>
    </div>

</body>

</html>
<script src='js/bootstrap.js'></script>