<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header('Location: index.php');
}
require('./HeaderFooter/Header.php');
require('./Function/ft_extension.php');

$fichier = $_FILES['fichier'];

$_SESSION['errorMessage'] = "";
if ($fichier['error'] == UPLOAD_ERR_OK) { // UPLOAD_ERR_OK est égale à 0
    // Ca, ça veut dire que l'upload s'est bien passé
    // Maintenant, on vérifie des infos sur le fichier uploadé
    $parties = explode('.', $fichier['name']); // ['fichier', 'pdf']
    $extension = $parties[1]; // 'pdf'
    if (getAndVerify("." . $extension)) {
        // C'est bon, c'est bien un fichier PDF
        // On va quand même vérifier le contenu du fichier pour être certain(e)
        // On ouvre le fichier tmp_name pour regarder ce qu'il y a dedans
        $finfo = finfo_open(FILEINFO_MIME);
        $info = finfo_file($finfo, $fichier['tmp_name']);

        if (str_contains($info, 'application/pdf')) {
            // Là on est certain(e)s que c'est vraiment du PDF

            // Maintenant on vérifie que la taille est OK
            $taille = filesize($fichier['tmp_name']);
            if ($taille < 99999999) {
                // La taille est en dessous de la limite, c'est ok

                // Enfin, on peut déplacer le fichier.
                $hash_email = hash('sha256', $_SESSION["email"]);
                move_uploaded_file($fichier['tmp_name'], "./Upload" . "/" . $hash_email . '.pdf');
            } else {
                $_SESSION['errorMessage'] = "Aie ! Le fichier est trop volumineux";
            }
        } else {
            $_SESSION['errorMessage'] = "Je t'ai vu, pirate !";
        }
    } else {
        $_SESSION['errorMessage'] = "Le fichier n'est pas valide";
    }
} else {
    // Il y a eu une erreur à l'envoi du fichier
    $_SESSION['errorMessage'] = "Oups";
}
?>

<?php
if (isset($_SESSION['errorMessage'])) { ?>
    <div class="error-message" style="text-align:center; color: red;">
        <?= $_SESSION['errorMessage'] ?>
    </div>
<?php unset($_SESSION['errorMessage']); // Supprime le message d'erreur de la session
} ?>

<h1 style='text-align:center; '>Envoyer un fichier</h1>

<!--
    Pour envoyer un fichier :
    - On utilisera la méthode POST parce qu'un fichier binaire dans l'URL, c'est pas super
    - On utilisera enctype avec la valeur multipart/form-data pour encoder la requête différemment
    -->
<form method="POST" enctype="multipart/form-data">
    <label for="titre">Titre</label>
    <input type="text" name="titre" id="titre">

    <label for="fichier">Choisir un fichier</label>
    <input type="file" name="fichier" id="fichier">

    <input type="submit" value="Envoyer le fichier">
</form>
</body>

</html>