<?php
            session_start();
            if(isset($_POST['submit'])) {
                $tanggal_transaksi = $_POST['tanggal_transaksi'];
                $nomor_rekening = $_POST['nomor_rekening'];
                $tonase = $_POST['tonase'];
                $total_harga = $_POST['total_harga'];
                // masukkan sekali file koneksi db
                $mysqli = new mysqli('localhost', 'root', '', 'ukl');

                //insert data user ke db
                $result = mysqli_query($mysqli,"INSERT INTO transaksi VALUES ('','$tanggal_transaksi','$nomor_rekening','$tonase','$total_harga')");

                //tunjukkan pesan jika user telah ditambah
                echo "Data added successfully . <a href='index.php'>View Data</a>";
                header("location:login.php");
            };
            ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi</title>
    <link rel="website icon" type="png" href="sahabat-high-resolution-logo-transparent.png">
    <link rel="stylesheet" href="">
    
</head>
<body>
    
    <div  align="center" class="container">
        <h1>Pemesanan</h1>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Tanggal Transaksi</td>
                    <td><input type="text" name="tanggal_transaksi" required></td>
                </tr>
                <tr>
                    <td>Nomor Rekening</td>
                    <td><input type="text" name="nomor_rekening" required></td>
                </tr>
                <tr>
                    <td>Tonase</td>
                    <td><input type="text" name="tonase" required></td>
                </tr>
                <tr>
                    <td>Total Harga</td>
                    <td><input type="text" name="total_harga" required></td>
                </tr>
                <tr>
                    <td><button class="submit" name="submit">Pesan</button></td>
                </tr>

            </table>
        </form>
    </div>
</body>
</html>