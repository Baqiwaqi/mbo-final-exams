<?php
//EMPTY INPUTS REGISTREER JONGERE
function emptyInputSignup($name, $email, $geboorte, $werkopleiding, $startdatum, $inschrijfdatum, $pwd, $pwdHerhaling) {
  $result;
  if (empty($name) || empty($email) || empty($geboorte) || empty($werkopleiding) || empty($startdatum) || empty($inschrijfdatum) || empty($pwd) || empty($pwdHerhaling)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

//INVALID EMAIL
function invalidEmail($email) {
  $result;
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}
//MATCHING PASSWORD
function pwdMatch($pwd, $pwdHerhaling) {
  $result;
  if ($pwd !== $pwdHerhaling) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

// EMAIL EXISTS JONGEREN
function emailExists($conn, $email) {
  $sql = "SELECT * FROM jongeren WHERE jongerenEmail = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../registratie.php?error=stmtfailed");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($resultData)) {
    // code... make into login code
    return $row;
  }
  else {
    $result = false;
    return $result;
  }

  mysqli_stmt_close($stmt);
}

//CREATE JONGEREN
function createUser($conn, $name, $email, $geboorte, $werkopleiding, $startdatum, $inschrijfdatum, $pwd) {
  $sql = "INSERT INTO jongeren (jongerenNaam, jongerenEmail, jongerenGeboortedatum, jongerenWerkOpleiding, jongerenStartdatum, jongerenInschrijfdatum, jongerenPwd) VALUES (?,?,?,?,?,?,?);";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../registratie.php?error=stmtcreatefailed");
    exit();
  }

  //DATES
  $geboorte = date("Y-m-d", strtotime($geboorte));
  $startdatum = date("Y-m-d", strtotime($startdatum));
  $inschrijfdatum = date("Y-m-d", strtotime($inschrijfdatum));

  //PASSWORD HASHING
  $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

  mysqli_stmt_bind_param($stmt, "sssssss", $name, $email, $geboorte, $werkopleiding, $startdatum, $inschrijfdatum, $hashedPwd);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  header("location: ../registarie.php?error=succes");
  exit();
}

//EMPTY INPUTS activiteitToevoegen
function emptyInputActiviteitToevoegen($name) {
  $result;
  if (empty($name)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
  }

// ACTIVITEIT TOEVOEGEN EXSISTS
function activiteitExists($conn, $name) {
  $sql = "SELECT * FROM activiteit WHERE activiteitNaam = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../registratie.php?error=stmtfailed");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($resultData)) {
    // code... make into login code
    return $row;
  }
  else {
    $result = false;
    return $result;
  }

  mysqli_stmt_close($stmt);
}

//CREATE Activiteit
function createActiviteit($conn, $name) {
  $sql = "INSERT INTO activiteit (activiteitNaam) VALUES (?);";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../registratie.php?error=stmtcreatefailed");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "s", $name);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  header("location: ../activiteitToevoegen.php?error=succes");
  exit();
}

//EMPTY INPUT ACTIVITEIT
function emptyInputactiviteitAanmelden($id, $activiteit, $startdatum, $status) {
  $result;
  if (empty($id) || empty($activiteit) || empty($startdatum) || empty($status)) {
    $result = true;
  } else {
    $result = false;
  }
  return $result;
}

//ACTIVITEIT START
function activiteitStart($conn, $id, $startdatum) {

  //DATES
  $startdatum = date("Y-m-d", strtotime($startdatum));

  $sql = "SELECT * FROM jongerenactiviteit WHERE jongerenId = ? AND activiteitStartdatum = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../activiteitAanmelden.php?error=stmtfailed");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "is", $id, $startdatum);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($resultData)) {
    // code... make into login code
    return $row;
  }
  else {
    $result = false;
    return $result;
  }

  mysqli_stmt_close($stmt);
}

//CREATE ACTIVITEIT
function createJongerenActiviteit($conn, $id, $activiteit, $startdatum, $status) {
  $sql = "INSERT INTO jongerenactiviteit (jongerenId , activiteitId, activiteitStartdatum, activiteitAfgerond) VALUES (?,?,?,?);";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../activiteitAanmelden.php?error=stmtcreatefailed");
    exit();
  }

  //DATES
  $startdatum = date("Y-m-d", strtotime($startdatum));


  mysqli_stmt_bind_param($stmt, "isss", $id, $activiteit, $startdatum, $status);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  header("location: ../activiteitAanmelden.php?error=succes");
  exit();
}
