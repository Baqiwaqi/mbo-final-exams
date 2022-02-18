<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!--style/index.css-->
    <link rel="stylesheet" href="style/index.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <title>Hoofdpagina</title>
  </head>
  <body>
    <!--header -->
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
          <img src="images/logo.png" alt="">
        </div>
        <div class="col-sm-6">
          <h1 class="text-center mt-5">Jeugd betrokken</h1>
        </div>
        <div class="col-sm-3">
          <nav class="navbar navbar-light">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="registratie.php">Jongeren Registratie</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="activiteitAanmelden.php">Jongeren Activiteiten</a>
              </li>

            </ul>
          </nav>
        </div>
      </div>
    </div>
    <!--end header -->
    <!-- navbar -->
    <nav class="navbar navbar-expand-sm navbar-light" style="background-color:#FB8500;">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center order-2" id="navbarText">
        <ul class="navbar-nav align-ceneter">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="activiteitAanmelden.php">Jongeren</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="overzichtenjongeren.php">Overzichten</a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- end navbar -->
    <!-- regfrom -->
    <div class="container d-flex justify-content-center mt-3">
        <div class="row">
            <div class="col-sm-12 ">
                <h1>Registreren</h1>
                <form class="form-horizontal" action="includes/registratie.inc.php" method="post">
                    <div class="form-group row">
                        <label class="col-form-label col-sm-4">Naam: </label>
                        <input class="form-control col-sm-8" type="text" id="voornaam" name="naam" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-4">Email: </label>
                        <input class="form-control col-sm-8" type="text" id="email" name="email" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-4">Geboortedatum: </label>
                        <input class="form-control col-sm-8" type="text" id="geboortedatum" name="geboortedatum" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-4">Werk of Opleiding: </label>
                        <input class="form-control col-sm-8" type="text" id="werkopleiding" name="werkopleiding" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-4">Startdatum werk of opleiding: </label>
                        <input class="form-control col-sm-8" type="text" id="startdatum" name="startdatum" placeholder="D-M-J" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-4">Inschrijfdatum: </label>
                        <input class="form-control col-sm-8" type="text" id="inschrijfdatum" name="inschrijfdatum" placeholder="D-M-J" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-4" for="Password">Wachtwoord:</label>
                        <input class="form-control col-sm-8" type="password" id="password" name="pwd" required>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-sm-4" for="Password">Herhaling Wachtwoord:</label>
                        <input class="form-control col-sm-8" type="password" id="pwdherhaling" name="pwdherhaling" required>
                    </div>
                    <div class="from-group row">
                        <div class="col-sm-offset-2 col-sm-12">
                            <button type="sumbit" class="btn col-sm-8" style="color: white; background-color: #219EBC;" name="submit" value="sumbit" required>Submit</button>
                        </div>
                    </div>
                </form>
                <!-- ERROR MESSAGES -->
                <?php
                  	if (isset($_GET["error"])) {
                      // code...
                      if ($_GET["error"] == "empty") {
                        echo "Niet alle velden ingevuld!";
                      }
                      elseif ($_GET["error"] == "invalidEmail") {
                        echo "Geen geldig emailadres!";
                      }
                      elseif ($_GET["error"] == "matchingPassword") {
                        echo "Vul beide velden in met het zelfde wachtwoord!";
                      }
                      elseif ($_GET["error"] == "emailExists") {
                        echo "Er is al een gebruiker met dit emailadres!";
                      }
                      elseif ($_GET["error"] == "stmtfailed") {
                        echo "Er ging iets fout, probeer opnieuw!";
                      }
                      elseif ($_GET["error"] == "stmtcreatefailed") {
                        echo "Er ging iets fout bij het aanmaken van de jongere!";
                      }
                      elseif ($_GET["error"] == "succes") {
                        echo "Jongeren succesvol geregistreed";
                      }
                    }
                 ?>
            </div>
        </div>
    </div>
    <!-- end regfrom -->

    <!-- footer -->
    <footer class="page-footer font-small pt-4">
      <div class="container-fluid">
        <div class="row">
          <div class=" col-md -12 footer-copyright text-center py-3" style="background-color: #FB8500;">© 2020 Copyright:
            <a href="index.php" style="color: white;">Jeugd betrokken</a>
          </div>
        </div>
      </div>
    </footer>
    <!-- end Footer -->
    <!-- Script bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <!-- End Script bootstrap -->
  </body>
</html>
