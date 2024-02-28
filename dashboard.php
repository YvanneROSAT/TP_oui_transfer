<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header('Location: index.php');
}
require('./HeaderFooter/Header.php');
?>


<h1>dashboard <?= $_SESSION['nom'] ?></h1>

<?php
require('./HeaderFooter/Footer.php');
?>