<?php
// Si vous avez besoin de la session, il vous faut session_start()
// en haut de la page, il ne doit être appelé qu'une seule fois.
session_start();

// Si la requête est faite en POST
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $identifiant = filter_input(INPUT_POST, "identifiant");
    $motdepasse = filter_input(INPUT_POST, "motdepasse");

    if($identifiant == "admin" && $motdepasse == "admin") {
        $_SESSION["connecte"] = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <?php if(isset($_SESSION["connecte"])): ?>
        <p>Yay, vous êtes connecté(e).</p>
    <?php else: ?>
    <form method="POST">
        <label for="identifiant">Identifiant</label>
        <input type="text" name="identifiant" id="identifiant">
        <label for="motdepasse">Mot de passe</label>
        <input type="password" name="motdepasse" id="motdepasse">

        <input type="submit" value="Connexion">
    </form>
    <?php endif; ?>
</body>
</html>