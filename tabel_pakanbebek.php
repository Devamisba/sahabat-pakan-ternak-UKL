<!DOCTYPE html>
<html>
<head>
    <title>Tabel Pakan bebek</title>
    <link rel="website icon" type="png" href="sahabat-high-resolution-logo-transparent.png">
    <link rel="stylesheet" href="">
</head>
<body>
    <h2>Tabel Pakan Bebek</h2>
    <table border="5">
        <tr>
            <th>ID</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Harga perkilo</th> 
            <th>Action</th>   
        </tr>
       
        <?php
        require "koneksi_database.php";
        $sql = mysqli_query($mysqli, "SELECT * FROM pakanbebek");

        if ($sql) {
            while($row = mysqli_fetch_assoc($sql)) {

                $id_bebek = $row['id_bebek'];
                $foto = $row['foto'];
                $nama = $row['nama'];
                $deskripsi = $row['deskripsi'];
                $harga = $row['harga_perkilo'];
                echo "<tr>
                        <td>".$row["id_bebek"]."</td>
                        <td>".$row["foto"]."</td>
                        <td>".$row["nama"]."</td>
                        <td>".$row["deskripsi"]."</td>
                        <td>".$row["harga_perkilo"]."</td>
                        <td>
                            <a href='edit_pakanbebek.php?id=".$row["id_bebek"]."' class='edit'>Edit</a> | 
                            <a href='delete_pakanbebek.php?id=".$row["id_bebek"]."' class='delete'>Delete</a>
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
        <a href="tambah_pakanbebek.php">ADD</a>
    </tr>
</body>
</html>