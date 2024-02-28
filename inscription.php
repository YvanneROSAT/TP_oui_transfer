<?php
session_start();
require('./HeaderFooter/Header.php');
?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="assets/logo.png">
    <meta charset="UTF-8">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/CSS/index.css">
    <title>Document</title>
</head>
<body> -->
    <!--Nav Section-->
<!-- <section class="nav-wrapper">
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
            <div class="hamburger-menu" id="hamburger-menu">
                <div class="hamburger">
                    
                </div>
            </div>
        </div>
    </div>
</section> -->
<!--ENd NAV-->
    <!-- Section: Design Block -->

    <?php
if (isset($_SESSION['errorMessage'])) { ?>
  <div class="error-message" style="text-align:center; color: red;">
    <?= $_SESSION['errorMessage']?>
  </div>
  <?php unset($_SESSION['errorMessage']); // Supprime le message d'erreur de la session
  } ?>

<section class=" text-center text-lg-start">

  <div class="card mb-3">
    <div class="row g-0 d-flex align-items-center">
      <div class="col-lg-4 d-none d-lg-flex">
        <img src="https://mdbootstrap.com/img/new/ecommerce/vertical/004.jpg" alt="Trendy Pants and Shoes"
          class="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" />
      </div>
      <div class="col-lg-8">
        <div class="card-body py-5 px-md-5">

          <form method="POST" action="./Actions/SignUpAction.php">
            <!-- Nom input -->
            <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">Nom</label>
              <input type="nom" id="form2Example1" name="nom" class="form-control" required />
             
            </div>
            <!-- Email input -->
            <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">Email address</label>
              <input type="email" id="form2Example1" name="email" class="form-control" required />
             
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
            <label class="form-label" for="form2Example2">Password</label>
              <input type="password" id="form2Example2" class="form-control" name="password" required/>
            </div>

            <!-- Confirm Password input -->
            <div class="form-outline mb-4">
            <label class="form-label" for="form2Example2">Confirm Password</label>
              <input type="password" id="form2Example2" class="form-control" name="confirmPassword" required/>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4" name="validate">Inscrivez vous</button>

          </form>

        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->

</form>
 <!--JQUERY-->
 <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<?php
require('./HeaderFooter/Footer.php');
?>
</body>
</html>

<style>
    .rounded-t-5 {
      border-top-left-radius: 0.5rem;
      border-top-right-radius: 0.5rem;
    }

    @media (min-width: 992px) {
      .rounded-tr-lg-0 {
        border-top-right-radius: 0;
      }

      .rounded-bl-lg-5 {
        border-bottom-left-radius: 0.5rem;
      }
    }
  </style>