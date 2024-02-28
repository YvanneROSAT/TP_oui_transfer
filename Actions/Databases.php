<?php
$serveur = 'mysql.yvannerosat.com';
$port = '3306';
$utilisateur = 'u479250329_UserTransfer';
$mot_de_passe = 'V]O*3w|L82o';
$bdd = 'u479250329_oui_transfer';

try {
    $connexion = new PDO("mysql:host=$serveur;port=$port;dbname=$bdd", $utilisateur, $mot_de_passe);

if($connexion) {
echo "Connexion réussi";
} else {
    echo "Erreur de connexionnnnnnn";
}

} catch(PDOException $e) {
echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
