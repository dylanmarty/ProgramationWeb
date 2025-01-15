<?php

include 'ConfigBaseDonnees.php';

session_start();

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

        // Préparer la requête pour vérifier l'utilisateur dans la base de données
        $req = $conn->prepare("SELECT Email, MotDePasse, Prenom, Nom FROM Utilisateurs WHERE Email=?");
        $req->bind_param("s", $email);
        $req->execute();
        $req->store_result();

        if ($req->num_rows > 0) {
            // Utilisateur trouvé, récupération des données
            $req->bind_result($user_email, $user_password, $prenom, $nom);
            $req->fetch();

            // Vérification du mot de passe en clair
            if ($mdp === $user_password) {
                // Mot de passe correct
                $_SESSION['Email'] = $user_email;
                $_SESSION['Prenom'] = $prenom;
                $_SESSION['Nom'] = $nom;
                header("Location: index.php");
                exit();
            } else {
                // Mot de passe incorrect
                $message = "Mot de passe incorrect.";
            }
        } else {
            // Aucun utilisateur trouvé avec cet email
            $message = "Désolé, nous ne trouvons pas votre compte.";
        }
    } else {
        $message = "Veuillez remplir tous les champs.";
    }
}

$conn->close(); 
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Connexion et inscription</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/connexion.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body class="bg-light">
    <?php include 'BarreNavigation.php'; ?>

    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-4 bg-white m-auto rounded-top">
                <h2 class="text-center">Connexion</h2>
                <p class="text-center text-muted lead">Se connecter à WWW</p>

                <form action="" method="POST">
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa fa-envelope"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="Adresse e-mail" name="Email">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa fa-lock"></i>
                        </span>
                        <input type="password" class="form-control" placeholder="Mot de passe" name="MotDePasse">
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
                            Vous n'avez pas de compte ? <a href="inscription.php">Inscription</a>
                        </p>
                    </div>
                </form>

            </div>
        </div>
    </div>

</body>

</html>
