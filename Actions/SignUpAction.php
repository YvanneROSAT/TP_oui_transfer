<?php
require('Databases.php');

if (isset($_POST['validate'])) {
    if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['nom'])) {
        $nom = filter_input(INPUT_POST, "nom");
        $email = filter_input(INPUT_POST, "email");
        $password = filter_input(INPUT_POST, "password");
        $password = password_hash($password, PASSWORD_DEFAULT);
        $bdd = connexion();
        $sql = "INSERT INTO Users (nom, email, password_user) VALUES (:nom, :email, :password)";
        $stmt = $bdd->prepare($sql);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        header('Location: ../dashboard.php ');
    } else {
        echo "Veuillez remplir tous les champs";
    }
}
