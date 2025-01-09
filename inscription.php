<?php

include 'ConfigBaseDonnees.php';

//connexion base de données:
// Connexion à la base de données
$conn = new mysqli($host, $username, $password, $dbname);

// Vérifier si la connexion est réussie
if ($conn->connect_error) {
    die("Échec de connexion à la base de données : " . $conn->connect_error);
}

if (isset($_POST['valider'])) {
    if (!empty($_POST['Nom']) and !empty($_POST['Prenom']) and !empty($_POST['Email']) and !empty($_POST['MotDePasse'])) {
        $nom = $_POST['Nom'];
        $prenom = $_POST['Prenom'];
        $email = $_POST['Email'];
        $mdp = $_POST['MotDePasse'];

        if (strlen($nom) > 50 || strlen($prenom) > 50) {
            $message = "Entrer un Nom ou un Prenom plus court";
        } else {
            $testemail = $conn->prepare("SELECT * FROM Utilisateurs WHERE Email=?");
            $testemail->bind_param("s",$email);
            $testemail->execute();
            $testemail->store_result();

            if ($testemail->num_rows == 0) {
                $insertion = $conn->prepare("INSERT INTO Utilisateurs(Nom,Prenom,Email,MotDePasse) VALUES(?,?,?,?)");
                $insertion->bind_param("ssss",$nom, $prenom, $email, $mdp);
                $insertion->execute();
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


    <?php
        include 'BarreNavigation.html';
    ?>
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
                        <input type="text" class="form-control" name="Nom" placeholder="Nom ">
                    </div>
                    <div class="input-group  mb-3">
                        <span class="input-group-text">
                            <i class="fa fa-user">
                            </i>
                        </span>
                        <input type="text" class="form-control" name="Prenom" placeholder="Prénom ">
                    </div>
                    <div class="input-group  mb-3">
                        <span class="input-group-text">
                            <i class="fa fa-envelope">
                            </i>
                        </span>
                        <input type="text" class="form-control" name="Email" placeholder="Email ">
                    </div>
                    <div class="input-group  mb-3">
                        <span class="input-group-text">
                            <i class="fa fa-lock">
                            </i>
                        </span>
                        <input type="text" class="form-control" name="MotDePasse" placeholder="Mot de passe ">
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