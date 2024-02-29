<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header('Location: index.php');
}
require('./HeaderFooter/Header.php');
?>


<h1 style='text-align:center; '>Bienvenu sur le Dashboard <?= $_SESSION['nom'] ?></h1>

<?php
require('./HeaderFooter/Footer.php');
?>