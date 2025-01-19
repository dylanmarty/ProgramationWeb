<html>
<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="css/MeilleurScores.css">
</head>

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
            include 'ConfigBaseDonnees.php';

            // Connexion à la base de données
            $conn = new mysqli($host, $username, $password, $dbname);

            // Vérifier la connexion
            if ($conn->connect_error) {
                die("Échec de connexion à la base de données : " . $conn->connect_error);
            }

            // Récupérer les meilleurs scores
            $sql = "SELECT Prenom, Pong FROM Utilisateurs INNER JOIN MeilleursScores ON MeilleursScores.ID = Utilisateurs.ID ORDER BY Pong DESC LIMIT 5";
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

            // Fermer la connexion à la base de données
            $conn->close();
            ?>
        </tbody>
    </table>
</div>

</html>