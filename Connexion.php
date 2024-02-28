<?php
require('./Actions/LoginAction.php');
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
        <a href="index.php" class="logo">
          <img src="assets/img/Logo.png">
        </a>
        <ul class="nav-menu" id="nav-menu">
          <li><a href="index.php">Accueil</a></li>
          <li><a href="index.php">Inscription</a></li>
          <li><a href="Connexion.php" class="btn btn-hover"><span>
                Connexion
              </span></a>
          </li>
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
  <section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-10">
          <div class="card rounded-3 text-black">
            <div class="row g-0">
              <div class="col-lg-6">
                <div class="card-body p-md-5 mx-md-4">

                  <div class="text-center">
                    <img src="assets/img/Logo.png" style="width: 185px;" alt="logo">
                    <h4 class="mt-1 mb-5 pb-1">Oui Transfert</h4>
                  </div>

                  <form method="POST">
                    <p style="font-size:1.8em">Connectez-vous</p>
                    <br>
                    <div class="form-outline mb-4">
                      <label class="form-label" for="form2Example11">Email:</label>
                      <input name="email" type="email" id="form2Example11" class="form-control" placeholder=" email address" />

                    </div>

                    <div class="form-outline mb-4">
                      <label class="form-label" for="form2Example22">Password:</label>
                      <input name="password" type="password" id="form2Example22" class="form-control" />

                    </div>

                    <div class="text-center pt-1 mb-5 pb-1">
                      <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Connexion</button>
                    </div>

                    <div class="d-flex align-items-center justify-content-center pb-4">
                      <p class="mb-0 me-2">Inscrivez-vous ?</p>
                      <a href="inscription.php" type="button" class="btn btn-outline-danger">Inscription</a>
                    </div>

                  </form>

                </div>
              </div>
              <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                  <h4 class="mb-4">We are more than just a company</h4>
                  <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--App Script-->
  <script src="assets/js/connexion.js"></script>
  <!--Owl Carousel-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!--JQUERY-->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</body>

</html>