<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header('Location: index.php');
    exit;
}
require('./HeaderFooter/Header.php');
require('./Actions/Databases.php');

function maskPassword($password) {
    // Remplacer chaque caractère du mot de passe par le caractère masqué "•"
    return str_repeat("•", strlen($password));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['new_username'])) {
        // Mettre à jour le pseudo de l'utilisateur dans la base de données
        $new_username = filter_input(INPUT_POST, "new_username", FILTER_SANITIZE_STRING);
        // la requête SQL
        $bdd = connexion();
        $sql = "UPDATE Users SET nom = :nom WHERE id = " . $_SESSION['id'];
        $stmt = $bdd->prepare($sql);
        $stmt->bindParam(':nom', $new_username);
        $stmt->execute();

        // Mettre à jour le pseudo dans les données de session
        $_SESSION['nom'] = $new_username;
        echo "<div class='alert alert-success'>Votre pseudo a été mis à jour avec succès.</div>";
    }
    if (!empty($_POST['new_email'])) {
        // Mettre à jour le mail dans la base de données
        $new_email = filter_input(INPUT_POST, "new_email", FILTER_SANITIZE_EMAIL);
        // la requête SQL
        $bdd = connexion();
        $sql = "UPDATE Users SET email = :email WHERE id = " . $_SESSION['id'];
        $stmt = $bdd->prepare($sql);
        $stmt->bindParam(':email', $new_email);
        $stmt->execute();

        // Mettre à jour l'e-mail dans les données de session
        $_SESSION['email'] = $new_email;
        echo "<div class='alert alert-success'>Votre e-mail a été mis à jour avec succès.</div>";
    }
    if (!empty($_POST['new_password']) && !empty($_POST['old_password'])) {
        // Vérifier l'ancien mot de passe de l'utilisateur
        $old_password = $_POST['old_password'];
        // la requête SQL
        $bdd = connexion();
        $sql = "SELECT password_user FROM Users WHERE id = " . $_SESSION['id'];
        $stmt = $bdd->prepare($sql);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (password_verify($old_password, $user['password_user'])) {
            // Le mot de passe actuel correspond, mettre à jour le mot de passe
            $new_password = $_POST['new_password'];
            // la requête SQL
            $sql = "UPDATE Users SET password_user = :password WHERE id = " . $_SESSION['id'];
            $stmt = $bdd->prepare($sql);
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $stmt->bindParam(':password', $hashed_password);
            $stmt->execute();

            // Mettre à jour le mot de passe dans les données de session
            $_SESSION['password'] = $new_password;
            echo "<div class='alert alert-success'>Votre mot de passe a été mis à jour avec succès.</div>";
        } else {
            echo "<div class='alert alert-danger'>L'ancien mot de passe saisi est incorrect.</div>";
        }
    }
}
?>

<h1 style="text-align:center">Mon profil</h1>

<container class="d-flex justify-content-center">
    <div class="card m-3 w-25 p-3 d-flex text-center mx-auto mx-auto justify-content-between">
        <h3>Modifier Nom</h3>
        <form method="POST">
            <div class="form-group m-3">
                <h4 class="m-3"><?php echo $_SESSION['nom'] ?></h4>
                <label for="new_username" class="mb-3">Nouveau Nom :</label>
                <input type="text" class="form-control d-inline" id="new_username" name="new_username">
                <button type="submit" class="btn btn-primary m-3">Mettre à jour</button>
            </div>
        </form>
    </div>
    
    <div class="card m-3 w-25 p-3 d-flex text-center mx-auto mx-auto justify-content-between">
        <h3>Modifier Email</h3>
        <form method="POST">
            <div class="form-group m-3">
                <h4 class="m-3"><?php echo $_SESSION['email'] ?></h4>
                <label for="new_email" class="mb-3">Nouvel email :</label>
                <input type="email" class="form-control" id="new_email" name="new_email">
                <button type="submit" class="btn btn-primary m-3">Mettre à jour</button>
            </div>
        </form>
    </div>

    <div class="card m-3 w-25 p-3 d-flex text-center mx-auto mx-auto justify-content-between">
        <h3>Modifier Mot de passe</h3>
        <form method="POST">
            <div class="form-group m-3">
            <h4 class="m-3"><?php echo maskPassword($_SESSION['password']); ?></h4>
                <label for="old_password" class="mb-3">Ancien mot de passe :</label>
                <input type="password" class="form-control" id="old_password" name="old_password">
            </div>
            <div class="form-group m-3">
                <label for="new_password">Nouveau mot de passe :</label>
                <input type="password" class="form-control" id="new_password" name="new_password">
                <button type="submit" class="btn btn-primary m-3">Mettre à jour</button>
            </div>
        </form>
    </div>
    
    <?php require('./HeaderFooter/Footer.php'); ?>
</container>
