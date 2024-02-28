<?php
$lang = [
    'fr' => [
        'title' => 'Bonjour',
        'text' => 'Ca va ?'
    ],
    'en' => [
        'title' => 'Hello',
        'text' => 'How do youdo fellow kids?'
    ]
];
$langueUtilisateur = $_SERVER['HTTP_ACCEPT_LANGUAGE'];

// Attention, c'est un exemple, trouvez un code PHP fiable sur le net
// pour détecter la langue
if(str_contains($langueUtilisateur, 'en') && !str_contains($langueUtilisateur, 'fr')) {
    $langueChoisie = 'en';
} else {
    $langueChoisie = 'fr';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <h1>
        <?php echo $lang[$langueChoisie]['title']; ?>
    </h1>
</head>
<body>
    <?php
    // Changer le code de statut HTTP :
    // http_response_code(400);
    ?>
</body>
</html>