<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header('Location: index.php');
    exit();
}

require('./Function/ft_get_info_partager.php');
$listeFicherPartager = get_info_partager($_SESSION['id']);

// require('Actions/fichier.php');
$results = getheFichiers();
$count = $results->rowCount();
$count2 = $listeFicherPartager->rowCount();


// Fonction pour obtenir le nom de fichier crypté à partir de l'ID du fichier
function getCryptedFileName($id_fichier)
{
    try {
        $bdd = connexion();
        $sql = "SELECT nom_fichier, nom_fichier_cryptee FROM Fichiers WHERE ID = :id_fichier";
        $stmt = $bdd->prepare($sql);
        $stmt->bindParam(':id_fichier', $id_fichier);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return [$result['nom_fichier_cryptee'], $result['nom_fichier']];
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
}



// Vérifiez si l'ID du fichier à télécharger est présent dans la session
if (isset($_SESSION['download_id'])) {
    // Obtenez le nom du fichier crypté à partir de l'ID du fichier
    $id_fichier = $_SESSION['download_id'];
    [$nom_fichier_cryptee, $nom_fichier] = getCryptedFileName($id_fichier);

    // Déclenchez le téléchargement du fichier
    $chemin_fichier = "./Upload/" . $nom_fichier_cryptee;
    header("Content-Type: application/octet-stream");
    header("Content-Transfer-Encoding: Binary");
    // Ici je passe le $nom_fichier pour que le nom du fichier télécharger soit le nom initial
    header("Content-disposition: attachment; filename=\"" . $nom_fichier . "\"");
    readfile($chemin_fichier);

    // Effacez l'ID du fichier de la session
    unset($_SESSION['download_id']);

    // header('Location: dashboard.php');


    // Terminez le script
    exit();
}



// var_dump($listeFicherPartager);


require('./HeaderFooter/Header.php');
?>



<h1 class="text-center my-5">Bienvenue sur le Dashboard</h1>
<?php
if (isset($_SESSION['errorMessage'])) { ?>
    <div class="error-message" style="text-align:center; color: red;">
        <?= $_SESSION['errorMessage'] ?>
    </div>
<?php unset($_SESSION['errorMessage']); // Supprime le message d'erreur de la session
} ?>

<?php
if (isset($_SESSION['success'])) { ?>
    <div class="success-message" style="text-align:center; color: green;">
        <?= $_SESSION['success'] ?>
    </div>
<?php unset($_SESSION['success']); // Supprime le message d'erreur de la session
} ?>

<h3 class="text-center my-3">Mes fichiers envoyés</h3>
<?php if($count == 0) { ?>
<div class="container">
        <div class="alert alert-info text-center mx-auto w-50" role="alert">
        Aucun fichier envoyer !
        </div>
    </div>

<?php } else { ?>
    <div class="container">
<div class="container mb-5">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nom du fichier</th>
                <th></th>
                <th></th>
                <th scope="col">Action</th>
                <th></th>
                <th></th>
                <th>Téléchargement</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <th><?php echo $r['nom_fichier'] ?></th>
                    <th colspan="5">
                        <div class="container text-center">
                            <div class="row justify-content-start">
                                <div class="col-6">
                                    <!-- Utilisez un formulaire pour envoyer l'ID du fichier lors du téléchargement -->
                                    <form action="./Actions/increment_and_download.php" method="post">
                                        <input type="hidden" name="id_fichier" value="<?= $r['id_fichier'] ?>">
                                        <button type="submit" class="btn btn-warning">Télécharger</button>
                                    </form>

                                </div>
                                <div class="col-6">
                                    <a onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette location ?');" href="delete.php?id=<?= $r['id_fichier'] ?>" class="btn btn-danger">Supprimer</a>
                                </div>
                            </div>
                        </div>
                    </th>
                    <th><?php echo $r['nombre_telechargement'] ?></th>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php } ?>

<!-- ------------------------------------ -->


<h3 class="text-center my-3">Mes partages</h3>
<?php if($count2 == 0) { ?>
    <div class="container">
        <div class="alert alert-info text-center mx-auto w-50" role="alert">
            Aucun fichier partagé !
        </div>
    </div>

<?php } else { ?>
<div class="container">
    <table class="table table-hover table-dark">
        <thead>
            <tr>
                <th scope="col">Nom du fichier</th>
                <th scope="col">Envoyé par</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
                <th scope="col">Téléchargement</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listeFicherPartager as $fichier) { ?>
                <tr>
                    <td><?php echo $fichier['nom_fichier']; ?></td>
                    <th><?php echo $fichier['nom'] ?></th>
                    <th><?php echo $fichier['email'] ?></th>
                    <td>
                        <!-- Utilisez un formulaire pour envoyer l'ID du fichier lors du téléchargement -->
                        <form action="./Actions/increment_and_download.php" method="post">
                            <input type="hidden" name="id_fichier" value="<?= $fichier['id_fichier'] ?>">
                            <button type="submit" class="btn btn-warning">Télécharger</button>
                        </form>
                    </td>

                    <th><?php echo $fichier['nombre_telechargement'] ?></th>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php } ?>

<?php
require('./HeaderFooter/Footer.php');
?>