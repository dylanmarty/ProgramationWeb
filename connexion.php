<?php

//Mise en relation de la base de donnée:
$host = "localhost";
$username = "root";
$password = "";
$base_name = "jeux_videos";

//connexion base de données:
$conn = new PDO("mysql:host=$host;dbname=$base_name", $username, $password);

if (isset($_POST['valider'])) {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $email = $_POST['email'];
        $mdp = $_POST['password'];
        $req = $conn->prepare("SELECT * from users where email=? AND password=?");
        $req->execute(array($email, $mdp));
        $cmpt = $req->rowCount();
        if ($cmpt == 1) {
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


    </head>

    <body class="bg-light">
        <div class="container ">
            <div class="row mt-5">
                <div class="col-lg-4 bg-white m-auto rounded-top">
                    <h2 class="text-center"> Connexion</h2>
                    <p class="text-center text-muted lead"> Se connecter à WWW </p>

                    <form action="">
                        <div class="input-group  mb-3">
                            <span class="input-group-text">
                                <i class="fa fa-envelope">
                                </i>
                            </span>
                            <input type="text" class="form-control" placeholder="Adresse e-mail  " name="email">
                        </div>

                        <div class="input-group  mb-3">
                            <span class="input-group-text">
                                <i class="fa fa-lock">
                                </i>
                            </span>
                            <input type="password" class="form-control" placeholder="Mot de passe " name="password">
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success" name="valider">Se connecter</button>
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
                                Vous n'avez pas de compte ?<a href="index.html"> Inscription </a>
                            </p>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </body>

    </html>