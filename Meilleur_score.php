<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Meilleur_Score.css">
    <title>Meilleurs scores</title>
    <?php
        include 'BarreNavigation.php';
    ?>
</head>
<body>
<div class="container">
    <h1>Meilleurs Scores Jeu du pong</h1>
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

            //connexion base de données:
            // Connexion à la base de données
            $conn = new mysqli($host, $username, $password, $dbname);
            
            // Vérifier si la connexion est réussie
            if ($conn->connect_error) {
                die("Échec de connexion à la base de données : " . $conn->connect_error);
            }
            $sql = "SELECT Prenom, Pong FROM Utilisateurs INNER JOIN MeilleursScores ON MeilleursScores.ID = Utilisateurs.ID ORDER BY Pong";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $rank = 1; // Variable pour le classement
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $rank++ . "</td>"; 
                    echo "<td>" . htmlspecialchars($row["Prenom"]) . "</td>"; 
                    echo "<td>" . htmlspecialchars($row["Pong"]) . "</td>";  
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>Aucun score trouvé</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
    
</body>
</html>