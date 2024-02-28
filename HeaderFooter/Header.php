<?php
// session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/CSS/connexion.css">
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


<body>
    <!--Nav Section-->
    <section class="nav-wrapper">
        <div class="container">
            <div class="nav">
                <a href="#" class="logo">
                    <img src="assets/img/Logo.png">
                </a>
                <ul class="nav-menu" id="nav-menu">
                    <?php if (isset($_SESSION['auth'])) { ?>
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li><a href="./envoyer.php" class="btn btn-hover"><span>
                                Envoyer
                            </span></a>
                        </li>
                        <li><a href="./profil.php" class="btn btn-hover"><span>
                                Profil
                            </span></a>
                        </li>
                        <li><a href="./Actions/Deconnexion.php" class="btn btn-hover"><span>
                                Déconnexion
                            </span></a>
                        </li>
                    <?php } else { ?>
                        <li><a href="inscription.php">Inscription</a></li>
                        <li><a href="Connexion.php" class="btn btn-hover"><span>
                                Connexion
                            </span></a>
                        </li>
                    <?php } ?>
                    
                
                </ul>
                <!--Mobile version-->
                <div class="hamburger-menu" id="hamburger-menu">
                    <div class="hamburger">

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--ENd NAV-->