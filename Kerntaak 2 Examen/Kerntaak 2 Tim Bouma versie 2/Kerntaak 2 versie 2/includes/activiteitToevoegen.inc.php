<?php

if (isset($_POST["submit"])) {

  $name = $_POST["naam"];


  require_once 'db.php';
  require_once 'functions.inc.php';
  //ERRORS
  if (emptyInputActiviteitToevoegen($name) !== false) {
    header("location: ../activiteitToevoegen.php?error=empty");
    exit();
  }

  if (activiteitExists($conn, $name) !== false) {
    header("location: ../activiteitToevoegen.php?error=activiteitExists");
    exit();
  }

  createActiviteit($conn, $name);

} else {
  header("location: ../index.php");
}
 ?>
