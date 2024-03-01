<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header('Location: index.php');
}
require('Actions/fichier.php');
 $results = getheFichiers();

require('./HeaderFooter/Header.php');
?>


<h1 style='text-align:center; '>Bienvenu sur le Dashboard <?= $_SESSION['nom'] ?></h1>
<table class="table">
        <br>
        <br>
        <tr>
        <th>nom_fichier</th>
            <th>nom_fichier_cryptee</th>
            <th>id_user</th>
            <th>Action</th>         
    </tr>
    <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) {

?>
<tr>
    <td><?php echo $r['nom_fichier'] ?></td>
    <td><?php echo $r['nom_fichier_cryptee'] ?></td>
    <td><?php echo $r['id_user'] ?></td>
    <td>
    <a href="./Upload/<?= $r['nom_fichier_cryptee'] ?>" class="btn btn-warning">download</a>
    <a onclick="return confirm('Are you sure you want to delete this rental?');" href="delete.php?id=<?php echo $r['id_user'] ?>" class="btn btn-danger">Delete</a>
    </td>
    <?php }
    ?>
<?php
require('./HeaderFooter/Footer.php');
?>