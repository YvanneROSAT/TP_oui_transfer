<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header('Location: index.php');
    exit;
}
require('./HeaderFooter/Header.php');
require('./Actions/Databases.php');

if (isset($_POST['validate-nom'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($_POST['new_username'])) {
            
            $new_username = filter_input(INPUT_POST, "new_username");

            
            $bdd = connexion();

            $sql = "SELECT nom FROM Users WHERE id=:id";
            $stmt = $bdd->prepare($sql);
            $stmt->bindParam(':id', $_SESSION['id']);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Comparaison de l'ancien et nouveau nom
            if ($new_username == $user['nom']) {
                $_SESSION['errorMessage'] = "Le nouveau nom est identique à l'ancien !";
                header('Location: profil.php');
                exit();
            }

            // Insert dans user : changement de nom
            $sql = "UPDATE Users SET nom = :nom WHERE id=:id";
            $stmt = $bdd->prepare($sql);
            $stmt->bindParam(':nom', $new_username);
            $stmt->bindParam(':id', $_SESSION['id']);
            $stmt->execute();

            // Mettre à jour le pseudo dans les données de session
            $_SESSION['nom'] = $new_username;
            $_SESSION['success'] = "Votre pseudo a été mis à jour avec succès.";
        } else {
            $_SESSION['errorMessage'] = "Veuillez remplir le champ nom.";
            header('Location: profil.php');
            exit();
        }
    }
}

if (isset($_POST['validate-email'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($_POST['new_email'])) {
            // Mettre à jour le mail dans la base de données
            $new_email = filter_input(INPUT_POST, "new_email");

            $bdd = connexion();

            $sql = "SELECT email FROM Users WHERE id=:id";
            $stmt = $bdd->prepare($sql);
            $stmt->bindParam(':id', $_SESSION['id']);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($new_email == $user['email']) {
                $_SESSION['errorMessage'] = "Le nouveau email est identique à l'ancien !";
                header('Location: profil.php');
                exit();
            }

            $sql = "SELECT COUNT(*) AS count FROM Users WHERE email = :email";
            $stmt = $bdd->prepare($sql);
            $stmt->bindParam(':email', $new_email);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result['count'] > 0) {
                $_SESSION['errorMessage'] = "Cette adresse e-mail est déjà utilisée.";
                header('Location: profil.php');
                exit();
            }

            $sql = "UPDATE Users SET email = :email WHERE id =:id ";
            $stmt = $bdd->prepare($sql);
            $stmt->bindParam(':email', $new_email);
            $stmt->bindParam(':id', $_SESSION['id']);
            $stmt->execute();

            // Mettre à jour l'e-mail dans les données de session
            $_SESSION['email'] = $new_email;
            $_SESSION['success'] = "Votre email a été mis à jour avec succès.";
        } else {
            $_SESSION['errorMessage'] = "Veuillez remplir le champ email !";
            header('Location: profil.php');
            exit();
        }
    }
}

if (isset($_POST['validate-mot-de-passe'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($_POST['new_password']) && !empty($_POST['old_password'])) {
            // Vérifier l'ancien mot de passe de l'utilisateur
            $old_password = $_POST['old_password'];
            $new_password = $_POST['new_password'];


            // la requête SQL
            $bdd = connexion();


            $sql = "SELECT password_user FROM Users WHERE id =:id ";
            $stmt = $bdd->prepare($sql);
            $stmt->bindParam(':id', $_SESSION['id']);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (password_verify($new_password, $user['password_user'])) {
                $_SESSION['errorMessage'] = "Votre nouveau mot de passe est le même que l'ancien !";
                header('Location: profil.php');
                exit();
            }

            if (password_verify($old_password, $user['password_user'])) {
                // Le mot de passe actuel correspond, mettre à jour le mot de passe

                // la requête SQL
                $sql = "UPDATE Users SET password_user = :password WHERE id =:id";
                $stmt = $bdd->prepare($sql);
                $stmt->bindParam(':id', $_SESSION['id']);
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                $stmt->bindParam(':password', $hashed_password);
                $stmt->execute();

                // Mettre à jour le mot de passe dans les données de session
                $_SESSION['password'] = $new_password;
                $_SESSION['success'] = "Votre mot de passe a été mis à jour avec succès.";
            } else {
                $_SESSION['errorMessage'] = "L'ancien mot de passe n'est pas bon.";
                header('Location: profil.php');
                exit();
            }
        } else {
            $_SESSION['errorMessage'] = "Ancien mot de passe et/ou nouveau mot de passe vide";
            header('Location: profil.php');
            exit();
        }
    }
}

?>

<h1 class="text-center my-5">Mon profil</h1>

<?php
if (isset($_SESSION['errorMessage'])) { ?>
    <div class="error-message" style="text-align:center; color: red;">
        <?= $_SESSION['errorMessage'] ?>
    </div>
<?php unset($_SESSION['errorMessage']); // Supprime le message d'erreur de la session
}

if (isset($_SESSION['success'])) { ?>
    <div class="success" style="text-align:center; color: green;">
        <?= $_SESSION['success'] ?>
    </div>
<?php unset($_SESSION['success']); // Supprime le message d'erreur de la session
}
?>

<container class="d-flex justify-content-center">
    <div class="card border border-0 shadow bg-body-tertiary rounded m-3 w-25 p-3 d-flex text-center mx-auto mx-auto justify-content-between">
        <h3>Modifier Nom</h3>
        <form method="POST">
            <div class="form-group m-3">
                <h4 class="m-3"><?php echo $_SESSION['nom'] ?></h4>
                <label for="new_username" class="mb-3">Nouveau Nom :</label>

                <input type="text" class="form-control d-inline" id="new_username" name="new_username">
                <button type="submit" name="validate-nom" class="btn btn-primary m-3">Mettre à jour</button>
            </div>
        </form>
    </div>

    <div class="card border border-0 shadow bg-body-tertiary rounded m-3 w-25 p-3 d-flex text-center mx-auto mx-auto justify-content-between">
        <h3>Modifier Email</h3>
        <form method="POST">
            <div class="form-group m-3">
                <h4 class="m-3"><?php echo $_SESSION['email'] ?></h4>
                <label for="new_email" class="mb-3">Nouvel email :</label>
                <input type="email" class="form-control" id="new_email" name="new_email">
                <button type="submit" name="validate-email" class="btn btn-primary m-3">Mettre à jour</button>
            </div>
        </form>
    </div>

    <div class="card border border-0 shadow bg-body-tertiary rounded m-3 w-25 p-3 d-flex text-center mx-auto mx-auto justify-content-between">
        <h3>Modifier Mot de passe</h3>
        <form method="POST">
            <div class="form-group m-3">
                <label for="old_password" class="mb-3">Ancien mot de passe :</label>
                <input type="password" class="form-control" id="old_password" name="old_password">
            </div>
            <div class="form-group m-3">
                <label for="new_password">Nouveau mot de passe :</label>
                <input type="password" class="form-control" id="new_password" name="new_password">
                <button type="submit" name="validate-mot-de-passe" class="btn btn-primary m-3">Mettre à jour</button>
            </div>
        </form>
    </div>

    <?php require('./HeaderFooter/Footer.php'); ?>
</container>