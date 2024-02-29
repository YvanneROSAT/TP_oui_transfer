<?php
require('Databases.php');
session_start();

if (isset($_POST['validate'])) {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {

        $email = filter_input(INPUT_POST, "email");
        $password = filter_input(INPUT_POST, "password");
        $password_encypt = password_hash($password, PASSWORD_DEFAULT);

        $bdd = connexion();

        $sql = "SELECT id, nom, email, password_user FROM Users WHERE email = :email";
        $stmt = $bdd->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérifie si l'utilisateur existe et si le mot de passe est correct
        if ($user && password_verify($password, $user['password_user'])) {
            // Enregistre l'ID de l'utilisateur dans la session
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['nom'] = $user['nom'];
        }

        // echo $_SESSION['email'];
        // echo "<br>";
        // echo "Password saisie par l'user : " . $password;
        // echo "<br>";
        // echo "Password bdd : " . $user['password_user'];
        // $test = password_verify($password, $user['password_user']);
        // echo "<br>";
        // echo $test;
        // echo "<br>";
        // echo " session id : " . $_SESSION['id'];
        // echo "<br>";
        // echo $user['id'];
        header('Location: ../dashboard.php ');
    } else {
        echo "Veuillez remplir tous les champs";
    }
}
