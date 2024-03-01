<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header('Location: index.php');
}

require('./HeaderFooter/Header.php');
// require('./Actions/EnvoyerFichierBdd.php');
?>


<h1 class="text-center my-5"'>Envoyer un fichier</h1>

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
        <div class="row">
            <form method="POST" enctype="multipart/form-data" action="./Actions/EnvoyerFichierBdd.php">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
        
                <label for="fichier">Choisir un fichier</label>
                <input type="file" name="fichier" id="fichier">
        
                <input type="submit" value="Envoyer le fichier">
            </form>
        </div>
    </div>
    
    <?php
    require('./HeaderFooter/Footer.php');
    ?>