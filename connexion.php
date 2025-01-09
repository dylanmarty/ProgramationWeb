<?php

include 'ConfigBaseDonnees.php';


// Connexion à la base de données
$conn = new mysqli($host, $username, $password, $dbname);

// Vérifier si la connexion est réussie
if ($conn->connect_error) {
    die("Échec de connexion à la base de données : " . $conn->connect_error);
}


if (isset($_POST['valider'])) {
    if (!empty($_POST['Email']) && !empty($_POST['MotDePasse'])) {

        $email = $_POST['Email'];
        $mdp = $_POST['MotDePasse'];

        $req = $conn->prepare("SELECT * from Utilisateurs where Email=? AND MotDePasse=?");
        $req->bind_param("ss",$email, $mdp);
        $req->execute();
        $req->store_result();

        if ($req->num_rows > 0) {
            $message = "Votre compte a bien été trouvé";
        } else {
            $message = "Désolé nous ne trouvons pas votre compte";
        }
    } else {
        $message = "Veuiller remplir tous les champs";
    }
}

$conn = null;


?>



<!DOC
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Connexion et inscription </title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' media='screen' href='css/connexion.css'>
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
                    <h2 class="text-center"> Connexion</h2>
                    <p class="text-center text-muted lead"> Se connecter à WWW </p>

                    <form action="" method="POST">
                        <div class="input-group  mb-3">
                            <span class="input-group-text">
                                <i class="fa fa-envelope">
                                </i>
                            </span>
                            <input type="text" class="form-control" placeholder="Adresse e-mail  " name="Email">
                        </div>

                        <div class="input-group  mb-3">
                            <span class="input-group-text">
                                <i class="fa fa-lock">
                                </i>
                            </span>
                            <input type="MotDePasse" class="form-control" placeholder="Mot de passe " name="MotDePasse">
                        </div>
                        <div class="d-grid">
                            <button type="buton" class="btn btn-success" name="valider">Se connecter</button>
                            <p class="text-center">
                                <i style="color: red">
                                    <?php
                                    if (isset($message)) {
                                        echo $message . "<br>";
                                    }
                                    ?>
                                </i>
                            </p>
                            <p class="text-center">
                                Vous n'avez pas de compte ?<a href="inscription.php"> Inscription </a>
                            </p>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </body>

    </html>