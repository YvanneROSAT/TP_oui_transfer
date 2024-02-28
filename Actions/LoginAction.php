<?php
require('Databases.php');

if (isset($_POST['validate'])) {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        
        $email = filter_input(INPUT_POST, "email");
        $password = filter_input(INPUT_POST, "password");

        $bdd = connexion();

        $sql = "SELECT * FROM USERS WHERE email = :email";
        $stmt = $bdd->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Vérifie si l'utilisateur existe et si le mot de passe est correct
    if ($user && password_verify($password, $user['password_user'])) {
        // Enregistre l'ID de l'utilisateur dans la session
        $_SESSION['user_id'] = $user['id'];

    }
        
        header('Location: ../dashboard.php ');
    } else {
        echo "Veuillez remplir tous les champs";
    }
}
