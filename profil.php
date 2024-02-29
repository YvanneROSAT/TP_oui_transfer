<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header('Location: index.php');
}
require('./HeaderFooter/Header.php');
?>

<h1 style='text-align:center; '>Mon profil</h1>


<form method="POST" action="./Actions/ProfileUsers.php">

            <!-- Email input -->
            <div class="form-outline mb-4">
            <label class="form-label" for="form2Example1">Email:</label>
              <input type="email" id="form2Example1" name="email" value="<?= $_SESSION['email'] ?>" class="form-control"/>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
            <label class="form-label" for="form2Example2">Password</label>
              <input type="password" id="form2Example2" class="form-control" name="password"/>
            </div>

            <!-- Confirm Password input -->
            <div class="form-outline mb-4">
            <label class="form-label" for="form2Example2">Confirm Password</label>
              <input type="password" id="form2Example2" class="form-control" name="confirmPassword"/>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4" name="validate">Enregister les modifications</button>

</form>