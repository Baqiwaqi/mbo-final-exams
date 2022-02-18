<?php
class DBController {

   $servername = "localhost";
   $dbUsername = "root";
   $dbPassword = "";
   $dbName = "jongerenbetrokken";

   $conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);
    function __construct() {
        $this->conn = $this->connectDB();
        if(!empty($this->conn)) {
            $this->selectDB();
        }
    }

    function connectDB() {
        $conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);
        return $conn;
    }

    function selectDB() {
        mysqli_select_db($this->conn, $this->database);
    }

    function runQuery($query) {
        $result = mysqli_query($this->conn, $query);
        while($row=mysqli_fetch_assoc($result)) {
            $resultset[] = $row;
        }
        if(!empty($resultset))
            return $resultset;
    }

    function numRows($query) {
        $result  = mysqli_query($this->conn, $query);
        $rowcount = mysqli_num_rows($result);
        return $rowcount;
    }
}
?>
