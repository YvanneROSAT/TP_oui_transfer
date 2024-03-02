<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header('Location: index.php');
}
require('Actions/fichier.php');
$results = getheFichiers();
require('./HeaderFooter/Header.php');
require('./Function/ft_get_info_partager.php');
$listeFicherPartager = get_info_partager($_SESSION['id']);
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

<h3 class="text-center my-5">Fichier Reçu</h3>
<div class="container">
    <table class="table table-success table-striped">
        <thead>
            <tr>
                <th scope="col">Nb téléchargement</th>
                <th scope="col">Envoyer par</th>
                <th scope="col">Son email</th>
                <th scope="col">Fichier</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listeFicherPartager as $liste) { ?>
                <tr>
                    <th scope="row"><?= $liste['nombre_telechargement'] ?></th>
                    <td><?= $liste['nom'] ?></td>
                    <td><?= $liste['email'] ?></td>
                    <td><?= $liste['nom_fichier'] ?></td>
                    <td>
                        
                    </td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>
</div>


<?php
require('./HeaderFooter/Footer.php');
?>