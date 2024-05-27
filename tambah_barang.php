<?php

    include "koneksi_database.php";

    if(isset($_POST["tambah_barang"])) {
        $nama = $_POST["nama"];
        $jenis = $_POST["jenis"];
        $harga = $_POST["harga"];

        $sql = "INSERT INTO barang (id_pakan, nama, jenis, harga) VALUES ('','$nama','$jenis', '$harga')";

        if($mysqli->query($sql)) {
        header("Location: tabel_barang.php");
        }else {
            echo "Data tidak MASUK: " . $db->error;
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
    <title>Tambah Barang</title>
</head>
<body>
    
    <?php
  
    ?>
    <h3>Tambah Barang</h3>
    <form action="" method="POST">
        <input type="text" placeholder="nama" name="nama"/>
        <input type="text" placeholder="jenis" name="jenis"/>
        <input type="text" placeholder="harga" name="harga"/>
        <button type="submit" name="tambah_barang">Tambah Barang</button>
    </form>

</body>
</html>