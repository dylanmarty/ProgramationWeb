<?php

//Mise en relation de la base de donnée:
$host = "localhost";
$username = "root";
$password = "";
$base_name = "jeux_videos";

//connexion base de données:
$connexion = new PDO("mysql:host=$host;dbname=$base_name", $username, $password);

if (isset($_POST['valider'])) {
    if (!empty($_POST['nom']) and !empty($_POST['prenom']) and !empty($_POST['email']) and !empty($_POST['password'])) {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $mdp = sha1($_POST['password']);

        if (strlen($nom) > 50 || strlen($prenom) > 50) {
            $message = "Entrer un nom ou un prenom plus court";
        } else {
            $testemail = $connexion->prepare("SELECT * FROM users WHERE email=?");
            $testemail->execute(array($email));

            $controlemail = $testemail->rowCount();

            if ($controlemail == 0) {
                $insertion = $connexion->prepare("INSERT INTO users(nom,prenom,email,password) VALUES(?,?,?,?)");
                $insertion->execute(array($nom, $prenom, $email, $mdp));
                $message = "Votre compte a bien été crée";
            } else {
                echo "Désolé mais cette adresse est associé à un compte existant";
            }
        }
    } else {
        $message = "Remplisser tous les champs";
    }
}

$connexion = null;
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Connexion et inscription </title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/inscription.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>

<body class="bg-light">
    <div class="container ">
        <div class="row mt-5">
            <div class="col-lg-4 bg-white m-auto rounded-top">
                <h2 class="text-center"> Inscription</h2>
                <p class="text-center text-muted lead"> Simple et Rapide </p>

                <form action="" method="POST">
                    <div class="input-group  mb-3">
                        <span class="input-group-text">
                            <i class="fa fa-user">
                            </i>
                        </span>
                        <input type="text" class="form-control" name="nom" placeholder="Nom ">
                    </div>
                    <div class="input-group  mb-3">
                        <span class="input-group-text">
                            <i class="fa fa-user">
                            </i>
                        </span>
                        <input type="text" class="form-control" name="prenom" placeholder="Prénom ">
                    </div>
                    <div class="input-group  mb-3">
                        <span class="input-group-text">
                            <i class="fa fa-envelope">
                            </i>
                        </span>
                        <input type="text" class="form-control" name="email" placeholder="Email ">
                    </div>
                    <div class="input-group  mb-3">
                        <span class="input-group-text">
                            <i class="fa fa-lock">
                            </i>
                        </span>
                        <input type="text" class="form-control" name="password" placeholder="Mot de passe ">
                    </div>
                    <div class="d-grid">
                        <button type="buton" name="valider" class="btn btn-success">S’inscrire</button>
                        <p class="text-center">
                            <i style="color: red">
                                <?php
                                if (isset($message)) {
                                    echo $message;
                                }
                                ?>
                            </i>
                        </p>
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