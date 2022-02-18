<?php

if (isset($_POST["submit"])) {

  $id = $_POST["jongerId"];
  $activiteit = $_POST["activiteit"];
  $startdatum = $_POST["startdatum"];
  $status = $_POST["afgerond"];

  require_once 'db.php';
  require_once 'functions.inc.php';

  //ERRORS
  if (emptyInputactiviteitAanmelden($id, $activiteit, $startdatum, $status) !== false) {
    header("location: ../activiteitAanmelden.php?error=empty");
    exit();
  }
  if (activiteitStart($conn, $id, $startdatum) !== false) {
    header("location: ../activiteitAanmelden.php?error=datum");
    exit();
  }
  

  createJongerenActiviteit($conn, $id, $activiteit, $startdatum, $status);

} else {
  header("location: ../jongerenoverzicht.php");
}
 ?>
