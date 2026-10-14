<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "usm_tracking_test";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Sambungan pangkalan data gagal: " . $conn->connect_error);
}
?>
