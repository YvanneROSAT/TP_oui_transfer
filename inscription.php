<?php
session_start();
require('./HeaderFooter/Header.php');
?>

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
            
            <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">Nom</label>
              <input type="nom" id="form2Example1" name="nom" class="form-control" required />
             
            </div>
            
            <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">Email address</label>
              <input type="email" id="form2Example1" name="email" class="form-control" required />
             
            </div>

            
            <div class="form-outline mb-4">
            <label class="form-label" for="form2Example2">Password</label>
              <input type="password" id="form2Example2" class="form-control" name="password" required/>
            </div>

          
            <div class="form-outline mb-4">
            <label class="form-label" for="form2Example2">Confirm Password</label>
              <input type="password" id="form2Example2" class="form-control" name="confirmPassword" required/>
            </div>

            
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