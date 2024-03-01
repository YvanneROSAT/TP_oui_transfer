<?php
require('./Actions/LoginAction.php');
require('./HeaderFooter/Header.php');
?>

<?php
if (isset($_SESSION['errorMessage'])) { ?>
  <div class="error-message" style="text-align:center; color: red;">
    <?= $_SESSION['errorMessage']?>
  </div>
  <?php unset($_SESSION['errorMessage']); // Supprime le message d'erreur de la session
  } ?>


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

                <form method="POST" action="./Actions/LoginAction.php">
                  <p style="font-size:1.8em">Connectez-vous</p>
                  <br>
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example11">Email:</label>
                    <input type="email" id="form2Example11" name="email" class="form-control" placeholder=" email address" />

                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example22">Password:</label>
                    <input type="password" id="form2Example22" name="password" class="form-control" />

                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit" name="validate">Connexion</button>
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
<?php
require('./HeaderFooter/Footer.php');
?>