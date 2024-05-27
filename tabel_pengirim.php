<!DOCTYPE html>
<html>
<head>
    <title>Tabel Pengirirm</title>
    <link rel="website icon" type="png" href="sahabat-high-resolution-logo-transparent.png">
    <link rel="stylesheet" href="">
</head>
<body>
    <h2>Tabel Pengirim</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Nomor telepon</th>
            <th>Action</th>
        </tr>
       
        <?php
        require "koneksi_database.php";
        $sql = mysqli_query($mysqli, "SELECT * FROM pengirim");

        if ($sql) {
            while($row = mysqli_fetch_assoc($sql)) {

                $id_pengirim = $row['id_pengirim'];
                $nama = $row['nama'];
                $alamat = $row['alamat'];
                $nomor_telepon = $row['nomor_telepon'];
                echo "<tr>
                        <td>".$row["id_pengirim"]."</td>
                        <td>".$row["nama"]."</td>
                        <td>".$row["alamat"]."</td>
                        <td>".$row["nomor_telepon"]."</td>
                        <td>
                            <a href='edit_pengirim.php?id=".$row["id_pengirim"]."' class='edit'>Edit</a> | 
                            <a href='delete_pengirim.php?id=".$row["id_pengirim"]."' class='delete'>Delete</a> | 
                            
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>0 results</td></tr>";
        }
        
        ?>
    </table>
    <tr>
        <a href="admin.php">kembali</a>
        <a href="tambah_pengirim.php">ADD</a>
    </tr>
</body>
</html>