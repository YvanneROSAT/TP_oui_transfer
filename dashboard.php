<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header('Location: index.php');
}
require('Actions/fichier.php');
$results = getheFichiers();
require('./HeaderFooter/Header.php');
?>


<h1 class="text-center my-5">Bienvenu sur le Dashboard <?= $_SESSION['nom'] ?></h1>
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">nom</th>
                <th scope="col">nom_fichier</th>
                <th scope="col">id_user</th>
                <th></th>
                <th></th>
                <th scope="col">Action</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <th><?php echo $r['nom'] ?></th>
                    <th><?php echo $r['nom_fichier'] ?></th>
                    <th><?php echo $r['id_user'] ?></th>
                    <th colspan="5">
                        <div class="container text-center">
                            <div class="row justify-content-start">
                                <div class="col-6">
                                    <a href="./Upload/<?= DownloadFichiers($r['nom_fichier']) ?>" class="btn btn-warning" download>download</a>
                                </div>
                                <div class="col-6">
                                    <a onclick="return confirm('Are you sure you want to delete this rental?');" href="delete.php?id=<?php echo $r['id_user'] ?>" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                    </th>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>
</div>


<?php
require('./HeaderFooter/Footer.php');
?>