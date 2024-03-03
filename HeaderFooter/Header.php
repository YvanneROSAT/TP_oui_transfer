<?php
// session_start();
// Vérifier le nom de la page actuelle pour ajouter la classe active
$currentFile = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="assets/CSS/connexion.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="assets/img/Logo.png">
    <!--Box-icons-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!--Boostrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oui Transfert</title>
</head>


<body class="bg-body-tertiary">
    <nav class="navbar navbar-expand-lg bg-body-tertiary border border-top-0 border-end-0 border-start-0">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img class="w-25 rounded" src="assets/img/Logo.png">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <?php if (isset($_SESSION['auth'])) { ?>
                        <a class="nav-link fs-6 mx-1 <?php if ($currentFile == 'dashboard.php') echo 'active text-black'; ?>" href="dashboard.php">Dashboard</a>
                        <a class="nav-link fs-6 mx-1 <?php if ($currentFile == 'envoyer.php') echo 'active text-black'; ?>" aria-current="page" href="envoyer.php">Envoyer</a>
                        <!-- <a class="nav-link fs-6 mx-1 <?php if ($currentFile == 'recu.php') echo 'active text-black'; ?>" aria-current="page" href="recu.php">Reçu</a> -->
                        <a class="nav-link fs-6 mx-1 <?php if ($currentFile == 'profil.php') echo 'active text-black'; ?>" aria-current="page" href="profil.php">Profil</a>
                        <a class="nav-link fs-6 mx-1 bg-danger rounded text-white" aria-current="page" aria-disabled="true" href="./Actions/Deconnexion.php">Déconnexion</a>
                        <div class="nav-link fs-5 mx-1 text-black">
                            <i class='bx bx-user'><?php echo $_SESSION['nom']; ?></i>
                        </div>
                    <?php } else { ?>
                        <a class="nav-link fs-5 mx-2 text-black" aria-disabled="true" href="inscription.php">Inscription</a>
                        <a class="nav-link fs-5 mx-2 text-white rounded bg-primary" aria-disabled="true" href="Connexion.php">Connexion</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </nav>
    </section>

    <!--JQUERY-->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="./assets/js/connexion.js"></script>
    <!--ENd NAV-->