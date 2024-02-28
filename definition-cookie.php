<?php
$themeChoisi = filter_input(INPUT_GET, "theme"); // ?theme=clair
setcookie('theme', $themeChoisi);

// Pour rappel, les codes 3xx sont des codes de redirection
// http_response_code(302); // Facultatif
// Définir le code dans le cadre de header() + Location est facultatif
// parce que le code de statut est défini automatiquement sur 302
// quand on utilise header() + Location
header('Location: /demo-cookies.php');
// Dans le cadre d'une redirection, le contenu de la réponse n'apporte
// que de l'ambiguité, il est préférable de ne jamais avoir de contenu
// quand on redirige la personne vers une autre page.
// Donc on arrête PHP.
exit();