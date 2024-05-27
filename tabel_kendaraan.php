<!DOCTYPE html>
<html>
<head>
    <title>Tabel Kendaraan</title>
    <link rel="website icon" type="png" href="sahabat-high-resolution-logo-transparent.png">
    <link rel="stylesheet" href="">
</head>
<body>
    <h2>Tabel Kendaraan</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>ID Pengirim</th>
            <th>Nama</th>
            <th>Jenis</th>
            <th>Plat</th> 
            <th>Action</th>   
        </tr>
       
        <?php
        require "koneksi_database.php";
        $sql = mysqli_query($mysqli, "SELECT * FROM kendaraan");

        if ($sql) {
            while($row = mysqli_fetch_assoc($sql)) {

                $id_kendaraan = $row['id_kendaraan'];
                $id_pengirim = $row['id_pengirim'];
                $nama = $row['nama'];
                $jenis = $row['jenis'];
                $plat = $row['plat'];
                echo "<tr>
                        <td>".$row["id_kendaraan"]."</td>
                        <td>".$row["id_pengirim"]."</td>
                        <td>".$row["nama"]."</td>
                        <td>".$row["jenis"]."</td>
                        <td>".$row["plat"]."</td>
                        <td>
                            <a href='edit_kendaraan.php?id=".$row["id_kendaraan"]."' class='edit'>Edit</a> | 
                            <a href='delete_kendaraan.php?id=".$row["id_kendaraan"]."' class='delete'>Delete</a>
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
        <a href="tambah_kendaraan.php">ADD</a>
    </tr>
</body>
</html>