<?php
session_start();
require('Databases.php');

// Vérifiez si l'ID du fichier est présent dans la requête
if (isset($_POST['id_fichier'])) {
    $id_fichier = $_POST['id_fichier'];
    
    // Exécutez la fonction pour incrémenter le compteur de téléchargements
    incrementDownloadCount($id_fichier);

    // Stockez l'ID du fichier dans la session
    $_SESSION['download_id'] = $id_fichier;
    
    // Redirigez l'utilisateur vers la page dashboard.php
    header("Location: ../dashboard.php");
    exit();
}

// Fonction pour incrémenter le compteur de téléchargements
function incrementDownloadCount($id_fichier)
{

    try {
        $bdd = connexion();
        // augmente de 1
        $sql = "UPDATE Fichiers SET nombre_telechargement = nombre_telechargement + 1 WHERE ID = :id_fichier";
        $stmt = $bdd->prepare($sql);
        $stmt->bindParam(':id_fichier', $id_fichier);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
    
}
?>
