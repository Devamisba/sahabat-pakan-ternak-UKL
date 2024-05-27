<?php

    include "koneksi_database.php";

    if(isset($_POST["tambah_pengirim"])) {
        $nama = $_POST["nama"];
        $alamat = $_POST["alamat"];
        $nomor_telepon = $_POST["nomor_telepon"];

        $sql = "INSERT INTO pengirim (id_pengirim, nama, alamat, nomor_telepon) VALUES ('','$nama','$alamat', '$nomor_telepon')";

        if($mysqli->query($sql)) {
        header("Location: tabel_pengirim.php");
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
    <title>Tambah Pengirim</title>
</head>
<body>
    
    <?php
  
    ?>
    <h3>Tambah Pengirim</h3>
    <form action="" method="POST">
        <input type="text" placeholder="nama" name="nama"/>
        <input type="text" placeholder="alamat" name="alamat"/>
        <input type="text" placeholder="nomor telepon" name="nomor_telepon"/>
        <button type="submit" name="tambah_pengirim">Tambah Pengirim</button>
    </form>

</body>
</html>