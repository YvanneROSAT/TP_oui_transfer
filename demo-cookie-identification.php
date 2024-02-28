<?php
// Etape 1 : Récupérer le cookie identifiant le client
$id = filter_input(INPUT_COOKIE, "id");
// Etape 2 : Est-ce que le client a un cookie ?
if(!$id) {
    // Etape 2A : Je génère un identifiant aléatoires
    $id = bin2hex(random_bytes(4)); // Fait des caractères hexadécimaux aléatoires
    setcookie('id', $id);
}

include 'sess_' . $id . '.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Souriez</title>
</head>
<body>
    <h1>Vous êtes identifié(e)s</h1>
    <p><?= $prenom ?></p>
</body>
</html>