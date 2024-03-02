<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header('Location: index.php');
}

require('./HeaderFooter/Header.php');
// require('./Actions/EnvoyerFichierBdd.php');
?>


<h1 class="text-center my-5">Envoyer un fichier</h1>

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

<!--
    Pour envoyer un fichier :
    - On utilisera la méthode POST parce qu' un fichier binaire dans l'URL, c'est pas super - On utilisera enctype avec la valeur multipart/form-data pour encoder la requête différemment -->
<div class="container">
    <div class="row mx-auto w-50">
        <form method="POST" enctype="multipart/form-data" action="./Actions/EnvoyerFichierBdd.php">
            <div class="mb-3">
                <label for="email" class="form-label">Envoyer à</label>
                <input type="text" class="form-control" id="email" aria-describedby="emailHelp" name="email" placeholder="Email1, Email2, Email3, ect">
            </div>

            <div>
                <label for="fichier" class="form-label">Choisir un fichier</label>
                <input class="form-control form-control-lg" id="fichier" type="file" name="fichier">
            </div>

            <button class="btn btn-primary mt-3" type="submit" value="Envoyer le fichier">Envoyer le fichier</button>
        </form>
    </div>
</div>

<?php
require('./HeaderFooter/Footer.php');
?>