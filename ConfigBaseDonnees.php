<?php
// Informations de connexion à la base de données
$host = "localhost";
$username = "root";
$password = "";
$base_name = "jeux_videos";

// Connexion à la base de données
$conn = new mysqli($host, $username, $password, $dbname);

// Vérifier si la connexion est réussie
if ($conn->connect_error) {
    die("Échec de connexion à la base de données : " . $conn->connect_error);
}else{
    Echo 'Victoire, connexion a la base de données reussi' ;
}

?> 