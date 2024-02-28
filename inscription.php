<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incription</title>
</head>
<body>
    <form method="POST" action="./Actions/SignUpAction.php">
                  <p style="font-size:1.8em">Incrivez-vous</p>
                  <br>

                  <div class="form-outline mb-4">
                  <label class="form-label" for="form2Example11">Email:</label>
                    <input type="email" id="form2Example11" name="email" class="form-control"
                      placeholder=" email address" />
                    
                  </div>
                  
                  <div class="form-outline mb-4">
                  <label class="form-label" for="form2Example11">Email:</label>
                    <input type="email" id="form2Example11" name="email" class="form-control"
                      placeholder=" email address" />
                    
                  </div>

                  <div class="form-outline mb-4">
                  <label class="form-label" for="form2Example22">Password:</label>
                    <input type="password" id="form2Example22" name="password" class="form-control" />
                    
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Inscription</button>
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Inscrivez-vous ?</p>
                    <a href="connexion.php" type="button" class="btn btn-outline-danger">Connexion</a>
                  </div>

    </form>
</body>
</html>