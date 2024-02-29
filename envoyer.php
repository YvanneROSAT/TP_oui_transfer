<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header('Location: index.php');
}
require('./HeaderFooter/Header.php');
?>

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