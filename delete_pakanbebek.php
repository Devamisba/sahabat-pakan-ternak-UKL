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
    $sql = "DELETE FROM pakanbebek WHERE id_bebek='$id'";
    if ($db->query($sql) === TRUE) {
        echo "<script>alert('hapus berhasil')</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
}

?>