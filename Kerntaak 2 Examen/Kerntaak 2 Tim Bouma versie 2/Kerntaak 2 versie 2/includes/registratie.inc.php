<?php

if (isset($_POST["submit"])) {

  $name = $_POST["naam"];
  $email = $_POST["email"];
  $geboorte = $_POST["geboortedatum"];
  $werkopleiding = $_POST["werkopleiding"];
  $startdatum = $_POST["startdatum"];
  $inschrijfdatum = $_POST["inschrijfdatum"];
  $pwd = $_POST["pwd"];
  $pwdHerhaling = $_POST["pwdherhaling"];

  require_once 'db.php';
  require_once 'functions.inc.php';
  //ERRORS
  if (emptyInputSignup($name, $email, $geboorte, $werkopleiding, $startdatum, $inschrijfdatum, $pwd, $pwdHerhaling) !== false) {
    header("location: ../registratie.php?error=empty");
    exit();
  }
  if (invalidEmail($email) !== false) {
    header("location: ../registratie.php?error=invalidEmail");
    exit();
  }
  if (pwdMatch($pwd, $pwdHerhaling) !== false) {
    header("location: ../registratie.php?error=matchingPassword");
    exit();
  }
  if (emailExists($conn, $email) !== false) {
    header("location: ../registratie.php?error=emailExists");
    exit();
  }

  createUser($conn, $name, $email, $geboorte, $werkopleiding, $startdatum, $inschrijfdatum, $pwd);

} else {
  header("location: ../index.php");
}
 ?>
