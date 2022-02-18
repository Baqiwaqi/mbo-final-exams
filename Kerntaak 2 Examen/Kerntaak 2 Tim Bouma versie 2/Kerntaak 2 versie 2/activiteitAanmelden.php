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
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Overzichten
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="overzichtjongeren.php">Jongeren</a>
              <a class="dropdown-item" href="overzichtactiviteiten.php">Jongeren Activiteiten</a>
              <a class="dropdown-item" href="overzichtactiviteit.php">Activiteit</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- end navbar -->
    <!-- regfrom -->
  <div class="container d-flex justify-content-center mt-3">
      <div class="row">
          <div class="col-sm-12 ">
              <h1>Inschrijven Activiteit</h1>
              <form class="form-horizontal" action="includes/activiteitAanmelden.inc.php" method="post">
                  <div class="form-group row">
                      <label class="col-form-label col-sm-4">Naam: </label>
                      <select class="form-control col-sm-8" type="text" id="jongerenId" name="jongerId" required>
                      <?php
                      require_once 'includes/db.php';

                      $sql = "SELECT * FROM jongeren";
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {

                      // output data of each row
                      while($row = $result->fetch_assoc()) {


                        echo '<option value='.$row["jongerenId"].'>'. $row["jongerenNaam"].'</option>';
                      }
                        echo "check db connectie";
                      }


                       ?>
                      </select>
                  </div>
                  <div class="form-group row">
                      <label class="col-form-label col-sm-4">Activiteit: </label>
                      <select class="form-control col-sm-8" type="text" id="activiteit" name="activiteit" required>
                        <?php
                        require_once 'includes/db.php';

                        $sql = "SELECT * FROM activiteit";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {

                        // output data of each row
                        while($row = $result->fetch_assoc()) {


                          echo '<option value='.$row["activiteitId"].'>'. $row["activiteitNaam"].'</option>';
                        }
                          echo "check db connectie";
                        }

                        $conn->close();
                         ?>

                      </select>
                  </div>
                  <div class="form-group row">
                      <label class="col-form-label col-sm-4">Startdatum: </label>
                      <input class="form-control col-sm-8" type="date" id="startdatum" name="startdatum" required>
                  </div>
                  <div class="form-group row">
                      <label class="col-form-label col-sm-4">Afgerond: </label>
                      <select class="form-control col-sm-8" type="text" id="afgerond" name="afgerond" required>
                        <option value="ja">Ja</option>
                        <option value="nee">Nee</option>
                      </select>
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
                    elseif ($_GET["error"] == "activiteitAvailible") {
                      echo "Je hebt deze activiteit al afgerond!";
                    }
                    elseif ($_GET["error"] == "excists") {
                      echo "Deze jongere staat niet ingeschreven!";
                    }
                    elseif ($_GET["error"] == "datum") {
                      echo "Je hebt deze activiteit gepland op deze dag!";
                    }
                    elseif ($_GET["error"] == "afgerond") {
                      echo "Je hebt deze activiteit al afgerond";
                    }
                    elseif ($_GET["error"] == "stmtfailed") {
                      echo "Je hebt deze activiteit al afgerond!";
                    }
                    elseif ($_GET["error"] == "stmtcreatefailed") {
                      echo "Er ging iets fout, probeer opnieuw!";
                    }
                    elseif ($_GET["error"] == "stmtfailedjongerenexists") {
                      echo "Er ging iets fout, probeer opnieuw!";
                    }
                    elseif ($_GET["error"] == "succes") {
                      echo "Je bent aangemeld veel plezier!";
                    }
                  }
               ?>
          </div>
      </div>
  </div>
  <!-- end activiteit registratie -->

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
