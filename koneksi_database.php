<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "ukl";

$mysqli = mysqli_connect($hostname, $username, $password, $database);

if ($mysqli->connect_error){
    echo "koneksi gagal";
    die("error");
}
?>