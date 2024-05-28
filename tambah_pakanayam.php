<?php

    include "koneksi_database.php";

    if(isset($_POST["tambah_barang"])) {
        $foto = $_POST["foto"];
        $nama = $_POST["nama"];
        $deskripsi = $_POST["deskripsi"];
        $harga_perkilo = $_POST["harga_perkilo"];

        $sql = "INSERT INTO pakanayam (id_ayam, foto, nama, deskripsi, harga_perkilo) VALUES ('','$foto','$nama','$deskripsi', '$harga_perkilo')";

        if($mysqli->query($sql)) {
        header("Location: tabel_pakanayam.php");
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
    <title>Tambah Pakan Ayam</title>
</head>
<body>
    
    <?php
  
    ?>
    <h3>Tambah Pakan Ayam</h3>
    <form action="" method="POST">
        <input type="text" placeholder="foto" name="foto"/>
        <input type="text" placeholder="nama" name="nama"/>
        <input type="text" placeholder="deskripsi" name="deskripsi"/>
        <input type="text" placeholder="harga perkilo" name="harga_perkilo"/>
        <button type="submit" name="tambah_barang">Tambah Barang</button>
    </form>

</body>
</html>