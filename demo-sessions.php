<?php
// Créer un identifiant s'il n'existe pas dans les cookies du client
// L'envoyer au client avec set_cookie
// Créer un fichier texte portant le nom de la session
// Rend disponible une variable PHP $_SESSION
session_start();

// Stocke une valeur dans la session, donc dans le fichier "secret"
// associé à cet identifiant de client
// $_SESSION["prenom"] = "Diane";

echo $_SESSION["prenom"];