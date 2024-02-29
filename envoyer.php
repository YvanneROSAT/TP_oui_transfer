<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header('Location: index.php');
}

require('./HeaderFooter/Header.php');
// require('./Actions/EnvoyerFichierBdd.php');
?>


<h1 style='text-align:center; '>Envoyer un fichier</h1>

<?php
if (isset($_SESSION['errorMessage'])) { ?>
    <div class="error-message" style="text-align:center; color: red;">
        <?= $_SESSION['errorMessage'] ?>
    </div>
<?php unset($_SESSION['errorMessage']); // Supprime le message d'erreur de la session
} ?>

<?php
if (isset($_SESSION['success'])) { ?>
    <div class="success-message" style="text-align:center; color: green;">
        <?= $_SESSION['success'] ?>
    </div>
<?php unset($_SESSION['success']); // Supprime le message d'erreur de la session
} ?>

<!--
    Pour envoyer un fichier :
    - On utilisera la méthode POST parce qu'un fichier binaire dans l'URL, c'est pas super
    - On utilisera enctype avec la valeur multipart/form-data pour encoder la requête différemment
    -->
<form method="POST" enctype="multipart/form-data" action="./Actions/EnvoyerFichierBdd.php">
    <label for="titre">Titre</label>
    <input type="text" name="titre" id="titre">

    <label for="fichier">Choisir un fichier</label>
    <input type="file" name="fichier" id="fichier">

    <input type="submit" value="Envoyer le fichier">
</form>
</body>

</html>