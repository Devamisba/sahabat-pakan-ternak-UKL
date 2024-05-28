<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "ukl";

$db = mysqli_connect($hostname, $username, $password, $database);

if($db->connect_error) {
    echo "Koneksi database gagal";
    die("error!");
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus user
    $sql = "DELETE FROM pakanayam WHERE id_ayam='$id'";
    if ($db->query($sql) === TRUE) {
        echo "<script>alert('hapus berhasil')</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
}
?>