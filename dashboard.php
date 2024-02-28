<?php
session_start();
// if (!isset($_SESSION['user_id'])) {
//     header('Location: index.php');
// }
var_dump($_SESSION);
echo  $_SESSION['id'];
require('./HeaderFooter/Header.php');
?>

<!-- <h1>Hello <?= $_SESSION['id'] ?></h1> -->

<h1>dashboard</h1>

<?php
require('./HeaderFooter/Footer.php');
?>