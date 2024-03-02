
<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header('Location: index.php');
}

require('Actions/fichier.php');

// Récupérer l'ID du fichier à supprimer
$id_fichier = $_GET['id'];


// Ici on supprime le fichier dans le dossier upload
$deletefileupload = deleteFileFromUpload($id_fichier);
if(!$deletefileupload){
    $_SESSION['errorMessage'] = "Erreur lors de la suppression (Dossier upload) !";
    header("Location: dashboard.php");
    exit();
}



// Ici on supprime tout les partage liées au fichier dans la bddd en raison de la clées étrangères fichiers -> sinon problème
$deletefileshare = deleteFileShares($id_fichier);
if(!$deletefileshare){
    $_SESSION['errorMessage'] = "Erreur lors de la suppression (PARTAGE) !";
    header("Location: dashboard.php");
    exit();
}

// Ici on supprime le fichier dans la bddd
$deletefilebdd = deleteFileFromDatabase($id_fichier);
if(!$deletefilebdd){
    $_SESSION['errorMessage'] = "Erreur lors de la suppression (FICHIER) !";
    header("Location: dashboard.php");
    exit();
}


$_SESSION['success'] = "Le fichier à été supprimer !";
// Rediriger vers la page dashboard
header("Location: dashboard.php");
exit();
?>
