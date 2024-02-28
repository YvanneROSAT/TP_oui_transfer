<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header('Location: index.php');
}
require('./HeaderFooter/Header.php');
?>

<h1 style='text-align:center; '>Envoyer un fichier</h1>