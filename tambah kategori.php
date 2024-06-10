<?php

    include "koneksi_database.php";

    if(isset($_POST["tambah_kategori"])) {
        $foto = $_POST['foto'];
        $nama = $_POST['nama'];
        $jenis = $_POST['jenis'];
        $deskripsi = $_POST['deskripsi'];
        $stok = $_POST['stok'];
        $harga_perton = $_POST['harga_perton'];
        $sql = "INSERT INTO kategori (id_kategori, foto, nama, jenis, deskripsi, stok, harga_perton) VALUES ('','$foto', '$nama', '$jenis', '$deskripsi', '$stok', '$harga_perton')";

        if($mysqli->query($sql)) {
        header("Location: tabel kategori.php");
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
    <title>Tambah Kategori</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    color: #333;
    margin: 0;
    padding: 20px;
}

h3 {
    color: #444;
    text-align: center;
}

form {
    background-color: #fff;
    padding: 20px;
    margin: 0 auto;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    border-radius: 5px;
    max-width: 400px;
}

input[type="text"],
input[type="number"] {
    width: 100%;
    padding: 8px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    background-color: #3498db;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-top: 10px;
    width: 100%;
}

button:hover {
    background-color: #2980b9;
}

    </style>
</head>
<body>
    
    <?php
  
    ?>
    <h3>Tambah Kategori</h3>
    <form action="" method="POST">
        <input type="text" placeholder="foto" name="foto"/>
        <input type="text" placeholder="nama" name="nama"/>
        <input type="text" placeholder="jenis" name="jenis"/>
        <input type="text" placeholder="deskripsi" name="deskripsi"/>
        <input type="text" placeholder="stok" name="stok"/>
        <input type="number" placeholder="harga_perton" name="harga_perton"/>
        <button type="submit" name="tambah_kategori">Tambah Kategori</button>
    </form>

</body>
</html>