<?php
//conect tot database
    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "jongerenbetrokken";

    $conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
 ?>
