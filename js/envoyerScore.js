function envoyerScore(jeu) {
    const scoreUtilisateur = document.getElementById("score").textContent;
    const utilisateurEmail = '<?php echo $_SESSION["Email"]; ?>';

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "SauvegarderScore.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
            MettreAJourScores(jeu); // Passer le paramètre jeu à la fonction pour l'utiliser dans la requête
        }
    };

    xhr.send("score=" + encodeURIComponent(scoreUtilisateur) + 
             "&email=" + encodeURIComponent(utilisateurEmail) + 
             "&jeu=" + encodeURIComponent(jeu));
}

function MettreAJourScores(jeu) {
    let xhr;
    console.log(jeu);
    if (jeu === "Pong") { 
        xhr = new XMLHttpRequest();
        xhr.open('GET', 'TableauScorePong.php', true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.getElementById('tableau').innerHTML = xhr.responseText;
            }
        };
    }

    if (jeu === "AttrapeEtoile") { 
        xhr = new XMLHttpRequest();
        xhr.open('GET', 'TableauScoreAttrapeEtoiles.php', true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.getElementById('tableau').innerHTML = xhr.responseText;
            }
        };
    }

    if (xhr) { 
        xhr.send();
    }
}
