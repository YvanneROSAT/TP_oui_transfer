<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header('Location: index.php');
}
require('Actions/fichier.php');
$id = $_GET['id'];
//Call Delete function
$result = DownloadFichiers($id);
//Redirect to list
if ($result) {
    header("Location: dashboard.php");
} else {
    echo"erreur";
}
?>  