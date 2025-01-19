<?php
session_start();

if (isset($_SESSION['Email'])) {
    include 'ConfigBaseDonnees.php';

    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Échec de la connexion : " . $conn->connect_error);
    }

    $jeu = isset($_POST['jeu']) ? $_POST['jeu'] : null;
    if (!$jeu) {
        echo "Le nom du jeu n'a pas été spécifié.";
        exit();
    }

    $nouveauScore = isset($_POST['score']) ? (int)$_POST['score'] : 0;
    $emailUtilisateur = $_SESSION['Email'];

    // Récupération de l'ID et du score du jeu depuis la base de données
    $requete = "SELECT Utilisateurs.ID, MeilleursScores.$jeu FROM Utilisateurs 
INNER JOIN MeilleursScores ON MeilleursScores.ID = Utilisateurs.ID 
WHERE Utilisateurs.Email=?";
    $stmt = $conn->prepare($requete);
    $stmt->bind_param("s", $emailUtilisateur); // On lie l'email de l'utilisateur
    $stmt->execute();
    $stmt->bind_result($idUtilisateur, $ancienScore);
    $stmt->fetch();
    
    // Assurez-vous de fermer la première requête avant d'en préparer une nouvelle
    $stmt->close();

    if ($idUtilisateur) {
        if ($nouveauScore > $ancienScore) {
            // Préparation de la requête UPDATE
            $requete = "UPDATE MeilleursScores SET $jeu = ? WHERE ID = ?";
            $stmt = $conn->prepare($requete);
            $stmt->bind_param("ii", $nouveauScore, $idUtilisateur); 
            $stmt->execute();
            echo "Nouveau score enregistré avec succès.";
        } else {
            echo "Le score n'a pas dépassé votre meilleur score.";
        }
    } else {
        echo "Utilisateur non trouvé.";
    }

    // Fermer la connexion à la base de données
    $conn->close();
} else {
    echo "Vous devez être connecté pour enregistrer votre score.";
}
?>
