<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/MeilleurScores.css">
    <title>Meilleurs Scores</title>
</head>
<body>
    <div class="scores-container">
        <h2>Meilleurs Scores</h2>
        <table>
            <thead>
                <tr>
                    <th>Rang</th>
                    <th>Nom</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Inclusion du fichier de configuration de la base de données
                include 'ConfigBaseDonnees.php';

                // Connexion à la base de données avec gestion des erreurs
                $conn = new mysqli($host, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Échec de la connexion à la base de données : " . $conn->connect_error);
                }

                // Requête pour récupérer les meilleurs scores
                $sql = "SELECT Prenom, Pong FROM Utilisateurs 
                        INNER JOIN MeilleursScores ON MeilleursScores.ID = Utilisateurs.ID 
                        ORDER BY Pong DESC LIMIT 5";
                $resultat = $conn->query($sql);

                if ($resultat->num_rows > 0) {
                    $rang = 1;
                    while ($ligne = $resultat->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $rang++ . "</td>";
                        echo "<td>" . htmlspecialchars($ligne["Prenom"]) . "</td>";
                        echo "<td>" . htmlspecialchars($ligne["Pong"]) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>Aucun score trouvé</td></tr>";
                }

                // Fermer la connexion
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
