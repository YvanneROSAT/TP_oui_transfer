<?php
// require('./Actions/Databases.php');
// $id_file = 45;

require('./Actions/fichier.php');

function get_info_partager($id_user_autorisee)
{
    try {
        $bdd = connexion();
        $sql = "SELECT U.nom, U.email, F.nombre_telechargement, F.nom_fichier, F.nom_fichier_cryptee, P.id_fichier FROM Fichiers F, Users U, Partage P WHERE F.id_user = U.id AND F.ID = P.id_fichier AND P.id_user_autorisee = :id_user_autorisee;";
        $stmt = $bdd->prepare($sql);
        $stmt->bindParam(':id_user_autorisee', $id_user_autorisee);
        $stmt->execute();

        // $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $stmt;
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}
