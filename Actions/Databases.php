<?php
$serveur = 'yvannerosat.com';
$utilisateur = 'u479250329_UserTransfer';
$mot_de_passe = 'V]O*3w|L82o';
$bdd = 'u479250329_oui_transfer';

try {
    $connexion = new PDO("mysql:host=$serveur;dbname=$bdd", $utilisateur, $mot_de_passe);

    if ($connexion) {
        echo "Connexion réussi";
    } else {
        echo "Erreur de connexion";
    }
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
