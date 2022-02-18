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
    <!-- ERROR MESSAGES -->
    <?php
    if (isset($_GET["error"])) {
      // code...
      if ($_GET["error"] == "") {
      echo "Niet alle velden ingevuld!";
      }
      elseif ($_GET["error"] == "succestoevoegen") {
      echo "Je hebt een jongere succesvol toegvoegd! <br>";
      }
      elseif ($_GET["error"] == "succesuitschrijven") {
      echo "Je hebt een jongere succesvol uitgeschreven! <br>";
      }
    }
    ?>
    <!-- medewerker opties -->
    <div class="container mt-3">
      <div class="row mt-3">
        <div class="col-sm-6">
          <i class="fas fa-user-plus mb-3" style="font-size: 200px;" ></i>
          <h4>Jongeren toevoegen</h4>
          <p>Klik hier als je een jongere wilt inschrijven.</p>
          <br>
          <a class="btn col-sm-5" style="color: white; background-color: #219EBC;" href="registratie.php">Registreren</a>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <i class="fas fa-chart-line mb-3" style="font-size: 200px;"></i><br>
          <h4>Activiteiten toevoegen</h4>
          <p>Klik hier om een activiteit toetevoegen</p>
          <br>
          <a class="btn col-sm-5" style="color: white; background-color: #219EBC;" href="activiteitToevoegen.php">Activiteiten</a>
        </div>
        <div class="col-sm-6">
          <i class="fas fa-chart-line mb-3" style="font-size: 200px;"></i><br>
          <h4>Activiteiten aanmeleden</h4>
          <p>Klik hier om je in te schrijven voor een activiteit</p>
          <br>
          <a class="btn col-sm-5" style="color: white; background-color: #219EBC;" href="activiteitAanmelden.php">Activiteiten</a>
        </div>
      </div>
      <div class="row mt-3 ">
        <div class="col-sm-4">
          <i class="fab fa-stack-overflow mb-3" style="font-size: 200px;"></i>
          <h4>Overzichten jongeren</h4>
          <p>Gegevens inkijken.</p>
          <a class="btn col-sm-5" style="color: white; background-color: #219EBC;" href="overzichtjongeren.php">Overzichten</a>
        </div>
        <div class="col-sm-4">
          <i class="fab fa-stack-overflow mb-3" style="font-size: 200px;"></i>
          <h4>Overzichten activiteiten</h4>
          <p>Gegevens inkijken.</p>
          <a class="btn col-sm-5" style="color: white; background-color: #219EBC;" href="overzichtactiviteiten.php">Overzichten</a>
        </div>
        <div class="col-sm-4">
          <i class="fab fa-stack-overflow mb-3" style="font-size: 200px;"></i>
          <h4>Overzichten activiteit</h4>
          <p>Gegevens inkijken.</p>
          <a class="btn col-sm-5" style="color: white; background-color: #219EBC;" href="overzichtactiviteit.php">Overzichten</a>
        </div>
      </div>
    </div>
  </div>
    <!-- end medewerker opties -->

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
