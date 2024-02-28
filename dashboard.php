<?php
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
}
require('./HeaderFooter/Header.php');
var_dump($_SESSION);
?>

<h1>Hello world</h1>

<?php
require('./HeaderFooter/Footer.php');
?>