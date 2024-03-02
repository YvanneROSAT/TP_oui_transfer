<?php
session_start();

require('Databases.php');
require('../Function/ft_extension.php');

function checkEmailExist($email)
{
    $bdd = connexion();
    $sql = "SELECT COUNT(*) AS count FROM Users WHERE email = :email";
    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['count'] > 0;
    // if ($result['count'] == 0) {
    //     $_SESSION['errorMessage'] = "Aucun compte n'existe avec la ou les adresses email saisie(s).";
    //     header('Location: ../envoyer.php');
    //     exit();
    // }
}

// cette fonction permet de récuperer l'id de l'user qu'on partage avec son email
function recupIdUserPourLequelOnPartage($email) {
    $bdd = connexion();
    $sql = "SELECT id FROM Users WHERE email = :email";
    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(':email', $email);;
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user['id'];
}


function recupIdFichier($nom_fichier, $fichier_cryptee, $id_user) {
    $bdd = connexion();
    $sql = "SELECT id FROM Fichiers WHERE nom_fichier = :nom_fichier AND nom_fichier_cryptee = :nom_fichier_cryptee AND id_user = :id_user";
    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(':nom_fichier', $nom_fichier);
    $stmt->bindParam(':nom_fichier_cryptee', $fichier_cryptee);
    $stmt->bindParam(':id_user', $_SESSION['id']);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user['id'];
}

function insertPartage($id_fichier_user, $id_users_partage, $id_email_user_partage){
    $bdd = connexion();

    $sql = "INSERT INTO Partage (id_fichier, id_utilisateur_partage, id_user_autorisee) VALUES (:id_fichier, :id_utilisateur_partage, :id_user_autorisee)";
    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(':id_fichier', $id_fichier_user);
    $stmt->bindParam(':id_utilisateur_partage', $id_users_partage);
    $stmt->bindParam(':id_user_autorisee', $id_email_user_partage);
    $stmt->execute();
    
}

function insertFichierBDD($nom_fichier, $fichier_cryptee, $id_user) {
    $bdd = connexion();
    $sql = "INSERT INTO Fichiers (nom_fichier, nom_fichier_cryptee, id_user) VALUES (:nom_fichier, :nom_fichier_cryptee, :id_user)";
    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(':nom_fichier', $nom_fichier);
    $stmt->bindParam(':nom_fichier_cryptee', $fichier_cryptee);
    $stmt->bindParam(':id_user', $_SESSION['id']);
    $stmt->execute();
}


$fichier = $_FILES['fichier'];
$email = filter_input(INPUT_POST, "email");
// $emails = explode(',', $email);
$emails = array_map('trim', explode(',', $email));

// echo $emails;
// echo "</br>";

// foreach ($emails as $email) {
//    echo $email;
//    echo "<br>";
// }


if (empty($email)) {
    $_SESSION['errorMessage'] = "Veuillez remplir tous les champs!";
    header('Location: ../envoyer.php');
    exit();
}

foreach ($emails as $email) {
    $email = trim($email);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        if (!checkEmailExist($email)) {
            $_SESSION['errorMessage'] = "Aucun compte n'existe avec l'adresse e-mail saisie: $email";
            header('Location: ../envoyer.php');
            exit();
        }
    } else {
        $_SESSION['errorMessage'] = "L'adresse e-mail $email n'est pas valide.";
        header('Location: ../envoyer.php');
        exit();
    }
}

if ($fichier['error'] != UPLOAD_ERR_OK) {
    $_SESSION['errorMessage'] = "Erreur lors de l'envoi du fichier.";
    header('Location: ../envoyer.php');
    exit();
}

$parties = explode('.', $fichier['name']);
// var_dump($parties);
// $extensionnnnnn = end($parties);
// var_dump($extensionnnnnn);
$extension = $parties[1];
// var_dump($extension);
$ext = '.' . $extension;

$finfo = finfo_open(FILEINFO_MIME);
$info = finfo_file($finfo, $fichier['tmp_name']);
$info_cleaned = strstr($info, "; charset=binary", true);

if (!getAndVerify($ext, $info_cleaned)) {
    $_SESSION['errorMessage'] = "Le fichier n'est pas valide.";
    header('Location: ../envoyer.php');
    exit();
}

$taille = filesize($fichier['tmp_name']);
if ($taille >= 20971520) {
    $_SESSION['errorMessage'] = "Aie! Le fichier est trop volumineux.";
    header('Location: ../envoyer.php');
    exit();
}

$hash_email = hash('sha256', $_SESSION["email"]);
$fichier_cryptee = $hash_email . uniqid() . $ext;
$nom_fichier = $fichier['full_path'];

move_uploaded_file($fichier['tmp_name'], '../Upload/' . $fichier_cryptee);

insertFichierBDD($nom_fichier, $fichier_cryptee, $_SESSION['id']);

$id_fichier_user = recupIdFichier($nom_fichier, $fichier_cryptee, $_SESSION['id']);

foreach ($emails as $email) {
    $email = trim($email);
    $id_email_user_partage = recupIdUserPourLequelOnPartage($email);
    insertPartage($id_fichier_user, $_SESSION['id'] , $id_email_user_partage);

    // insertPartage($id_fichier_user, $id_users_partage, $id_email_user_partage){
}

$_SESSION['success'] = "Votre fichier a été envoyé avec succès.";
header('Location: ../envoyer.php');
exit();

?>