<?php
session_start();
// if (!isset($_SESSION['user_id'])) {
//     header('Location: index.php');
// }
require('./HeaderFooter/Header.php');
?>

<h1>Hello <?= $_SESSION['id'] ?></h1>

<?php
require('./HeaderFooter/Footer.php');
?>