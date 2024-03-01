<?php

require('Databases.php');


function getheFichiers()
{
    try {
        $bdd = connexion();
        $sql = "SELECT `nom`, Fichiers.id AS id_fichier ,`nom_fichier`, id_user FROM `Fichiers`, `Users` WHERE Fichiers.id_user = Users.ID AND id_user = :id_user";
        $stmt = $bdd->prepare($sql);
        $stmt->bindParam(':id_user', $_SESSION['id']);
        $stmt->execute();
        return $stmt;
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}


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


