<!DOCTYPE html>
<html>
<head>
    <title>Tabel Pakan Babi</title>
    <link rel="website icon" type="png" href="sahabat-high-resolution-logo-transparent.png">
    <link rel="stylesheet" href="">
</head>
<body>
    <h2>Tabel Pakan Babi</h2>
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
        $sql = mysqli_query($mysqli, "SELECT * FROM pakanbabi");

        if ($sql) {
            while($row = mysqli_fetch_assoc($sql)) {

                $id_babi = $row['id_babi'];
                $foto = $row['foto'];
                $nama = $row['nama'];
                $deskripsi = $row['deskripsi'];
                $harga = $row['harga_perkilo'];
                echo "<tr>
                        <td>".$row["id_babi"]."</td>
                        <td>".$row["foto"]."</td>
                        <td>".$row["nama"]."</td>
                        <td>".$row["deskripsi"]."</td>
                        <td>".$row["harga_perkilo"]."</td>
                        <td>
                            <a href='edit_pakanbabi.php?id=".$row["id_babi"]."' class='edit'>Edit</a> | 
                            <a href='delete_pakanbabi.php?id=".$row["id_babi"]."' class='delete'>Delete</a>
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
        <a href="tambah_pakanbabi.php">ADD</a>
    </tr>
</body>
</html>