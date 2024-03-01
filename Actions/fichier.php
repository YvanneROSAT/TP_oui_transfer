<?php

require('Databases.php');


 function getheFichiers()
    {
        try {
            $bdd=connexion();
            $sql = "SELECT `nom`, `nom_fichier`,id_user FROM `Fichiers` , Users WHERE Fichiers.id_user=Users.ID";
            $result =$bdd->query($sql);
            return $result;
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

    function DownloadFichiers($id)
    {
        try {
            $bdd=connexion();
            $sql = "SELECT  FROM `Fichiers` WHERE id_user=:id";
            $stmt =$bdd->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    