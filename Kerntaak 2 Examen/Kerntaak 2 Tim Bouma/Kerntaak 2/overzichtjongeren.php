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
    <h4 class="text-center">Jongeren Overzicht</h1>

    <?php
      require_once 'includes/db.php';

      $sql = "SELECT * FROM jongeren";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
    echo "<table class='table table-striped'>
            <tr>
              <th>ID</th>
              <th>Naam</th>
              <th>Email</th>
              <th>Geboorte Datum</th>
              <th>Minderjarig</th>
              <th>Werk of Opleding</th>
              <th>Startdatum werk of opleiding</th>
              <th>InschrijfDatum</th>
            </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {


      if ($row["jongerenGeboortedatum"] >= (date('Y') - 18).'-'.date('m-d')) {
        $minderjarig = "Ja";
      }else {
        $minderjarig = "Nee";
      }


        echo "<tr>
                <td>" . $row["jongerenId"]. "</td>
                <td>" . $row["jongerenNaam"]. "</td>
                <td>" . $row["jongerenEmail"]. "</td>
                <td>" . $row["jongerenGeboortedatum"]. "</td>
                <td>" . $minderjarig . "</td>
                <td>" . $row["jongerenWerkOpleiding"]. "</td>
                <td>" . $row["jongerenStartdatum"]. "</td>
                <td>" . $row["jongerenInschrijfdatum"]. "</td>
              </tr>";
      }
        echo "</table>";
      } else {
        echo "0 results";
      }

$conn->close();
?>
<a href="generate_pdf_jongeren.php" class="btn col-sm-4" style="color: white; background-color: #219EBC;" name="generate_pdf" required>Print as PDF</a>


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
