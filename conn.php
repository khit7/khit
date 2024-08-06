<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'std';

$mysqli = new mysqli($servername, $username, $password, $database);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

$sql = "SELECT * FROM std_dt ORDER BY PIN";

$stmt = $mysqli->prepare($sql);
$stmt->execute();

$result = $stmt->get_result();

$stmt->close();
$mysqli->close();
?>
