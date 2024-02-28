<?php
$themeChoisi = filter_input(INPUT_COOKIE, "theme");
if(!$themeChoisi) {
    $themeChoisi = "clair";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Démo cookies</title>
    <style>
        body, body.clair {
            background: #FEFEFE;
            color: #2B2B2B;
        }
        body.sombre {
            background: #2B2B2B;
            color: #FEFEFE;
        }
    </style>
</head>
<body class="<?= $themeChoisi ?>">
    <nav>
        <ul>
            <li>
                <a href="definition-cookie.php?theme=clair">Thème clair</a>
            </li>
            <li>
                <a href="definition-cookie.php?theme=sombre">Thème sombre</a>
            </li>
        </ul>
    </nav>
    <h1>Page présentant les cookies</h1>
    <p>
        Voici un exemple présentant les cookies
    </p>
</body>
</html>