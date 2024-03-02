<?php
session_start();

require('Databases.php');
require('../Function/ft_extension.php');

function checkEmailExist($email)
{
    $bdd = connexion();
    $sql = "SELECT COUNT(*) AS count FROM Users WHERE email = :email";
    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result['count'] == 0) {
        $_SESSION['errorMessage'] = "Aucun compte n'existe avec l'adresse email saisie.";
        header('Location: ../envoyer.php');
        exit();
    }
}


$fichier = $_FILES['fichier'];
$email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);

if (!$email) {
    $_SESSION['errorMessage'] = "L'adresse email n'est pas valide !";
    header('Location: ../envoyer.php ');
    exit();
}

checkEmailExist($email);


if ($fichier['error'] == UPLOAD_ERR_OK) { // UPLOAD_ERR_OK est égale à 0
    // Ca, ça veut dire que l'upload s'est bien passé
    // Maintenant, on vérifie des infos sur le fichier uploadé
    $parties = explode('.', $fichier['name']); // ['fichier', 'pdf']
    $extension = $parties[1];

    $finfo = finfo_open(FILEINFO_MIME);
    $info = finfo_file($finfo, $fichier['tmp_name']);
    // var_dump($info);

    $ext = '.' . $extension;

    $info_split = strstr($info, "; charset=binary", true); // Retire la partie à partir de "; charset=binary"
    $info_cleaned = ($info_split !== false) ? trim($info_split) : $info; // Supprime les espaces supplémentaires


    if (getAndVerify($ext, $info_cleaned)) {
        // C'est bon, c'est bien un fichier PDF
        // On va quand même vérifier le contenu du fichier pour être certain(e)
        // On ouvre le fichier tmp_name pour regarder ce qu'il y a dedans


        // Là on est certain(e)s que c'est vraiment du PDF

        // Maintenant on vérifie que la taille est OK
        $taille = filesize($fichier['tmp_name']);
        if ($taille < 20971520) {
            // La taille est en dessous de la limite, c'est ok

            // Enfin, on peut déplacer le fichier.
            $hash_email = hash('sha256', $_SESSION["email"]);

            $fichier_cryptee = $hash_email . uniqid() . $ext;
            $nom_fichier = $fichier['full_path'];

            move_uploaded_file($fichier['tmp_name'], '../Upload/' . $fichier_cryptee);

            $bdd = connexion();
            $sql = "INSERT INTO Fichiers (nom_fichier, nom_fichier_cryptee, id_user) VALUES (:nom_fichier, :nom_fichier_cryptee, :id_user)";
            $stmt = $bdd->prepare($sql);
            $stmt->bindParam(':nom_fichier', $nom_fichier);
            $stmt->bindParam(':nom_fichier_cryptee', $fichier_cryptee);
            $stmt->bindParam(':id_user', $_SESSION['id']);
            $stmt->execute();

            $_SESSION['success'] = "Votre fichier " . " à été envoyer";

            header('Location: ../envoyer.php ');
            exit();
        } else {
            $_SESSION['errorMessage'] = "Aie ! Le fichier est trop volumineux";
            header('Location: ../envoyer.php ');
        }
    } else {
        $_SESSION['errorMessage'] = "Le fichier n'est pas valide";
        header('Location: ../envoyer.php ');
    }
} else {
    // Il y a eu une erreur à l'envoi du fichier
    $_SESSION['errorMessage'] = "Veuillez remplir tout les champs !";
    header('Location: ../envoyer.php ');
}
