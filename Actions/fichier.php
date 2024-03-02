<?php

require('Databases.php');


function getheFichiers()
{
    try {
        $bdd = connexion();
        $sql = "SELECT `nom`, nombre_telechargement, Fichiers.id AS id_fichier ,`nom_fichier`, id_user FROM `Fichiers`, `Users` WHERE Fichiers.id_user = Users.ID AND id_user = :id_user";
        $stmt = $bdd->prepare($sql);
        $stmt->bindParam(':id_user', $_SESSION['id']);
        $stmt->execute();
        return $stmt;
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

// Plus utiliser
    function DeleteFichiers($id)
    {
        try {
            $bdd=connexion();
            $sql = "DELETE FROM `Fichiers` WHERE id_user=:id";
            $stmt =$bdd->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    // plus utiliser
    function DownloadFichiers($nom_fichier)
    {
        try {
            $bdd = connexion();
            $sql = "SELECT `nom_fichier_cryptee` FROM `Fichiers` WHERE nom_fichier=:nom_fichier";
            $stmt = $bdd->prepare($sql);
            $stmt->bindparam(':nom_fichier', $nom_fichier);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['nom_fichier_cryptee'];
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    function incrementDownloadCount($id_fichier)
{
    try {
        $bdd = connexion();
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


// Fonction pour supprimer les partages associés au fichier
function deleteFileShares($id_fichier)
{
    try {
        $bdd = connexion();
        $sql = "DELETE FROM Partage WHERE id_fichier = :id_fichier";
        $stmt = $bdd->prepare($sql);
        $stmt->bindParam(':id_fichier', $id_fichier);
        $stmt->execute();

        // echo "partage supprimer";
        // var_dump("partage supprimer");

        return true;
        
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

// Fonction pour supprimer le fichier de la base de données
function deleteFileFromDatabase($id_fichier)
{
    try {
        $bdd = connexion();
        $sql = "DELETE FROM Fichiers WHERE ID = :id_fichier";
        $stmt = $bdd->prepare($sql);
        $stmt->bindParam(':id_fichier', $id_fichier);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

// Fonction pour supprimer le fichier du dossier d'upload
function deleteFileFromUpload($id_fichier)
{
    try {
        // Récupérer le nom du fichier à partir de son ID
        $bdd = connexion();
        $sql = "SELECT nom_fichier_cryptee FROM Fichiers WHERE ID = :id_fichier";
        $stmt = $bdd->prepare($sql);
        $stmt->bindParam(':id_fichier', $id_fichier);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $nom_fichier_cryptee = $result['nom_fichier_cryptee'];
        
        // Supprimer le fichier du dossier d'upload
        $chemin_fichier = './Upload/'.$nom_fichier_cryptee;

        // echo $chemin_fichier;
        // echo "</br>";
        // echo "file_exists(chemin_fichier) --> ";
        // $test = file_exists($chemin_fichier);
        // echo "</br>";
        // echo $test;

        // var_dump();

        if (file_exists($chemin_fichier)) {
            if (unlink($chemin_fichier)) {
                echo "Fichier supprimé avec succès.<br/>";
            } else {
                echo "Erreur lors de la suppression du fichier.<br/>";
            }
        } else {
            echo "Le fichier n'existe pas.<br/>";
        }


        // if (file_exists($chemin_fichier)) {
        //     unlink($chemin_fichier);
        // }
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}

