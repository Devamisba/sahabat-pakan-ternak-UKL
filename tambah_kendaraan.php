<?php

include "koneksi_database.php";

if(isset($_POST["tambah_kendaraan"])) {
    $id_pengirim = $_POST["id_pengirim"];
    $nama = $_POST["nama"];
    $jenis = $_POST["jenis"];
    $plat = $_POST["plat"];

    // Check if the id_pengirim exists in the pengirim table
    $check_sql = "SELECT * FROM pengirim WHERE id_pengirim = '$id_pengirim'";
    $result = $mysqli->query($check_sql);

    if($result->num_rows > 0) {
        // id_pengirim exists, proceed to insert
        $sql = "INSERT INTO kendaraan (id_kendaraan, id_pengirim, nama, jenis, plat) VALUES (NULL, '$id_pengirim', '$nama', '$jenis', '$plat')";
        if($mysqli->query($sql)) {
            header("Location: tabel_kendaraan.php");
        } else {
            echo "Data tidak MASUK: " . $mysqli->error;
        }
    } else {
        // id_pengirim does not exist
        echo "Error: id_pengirim does not exist in the pengirim table.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="#">
    <title>Tambah Kendaraan</title>
</head>
<body>
    <h3>Tambah Kendaraan</h3>
    <form action="" method="POST">
        <input type="number" placeholder="id_pengirim" name="id_pengirim" required />
        <input type="text" placeholder="nama" name="nama" required />
        <input type="text" placeholder="jenis" name="jenis" required />
        <input type="text" placeholder="plat" name="plat" required />
        <button type="submit" name="tambah_kendaraan">Tambah Kendaraan</button>
    </form>
</body>
</html>
