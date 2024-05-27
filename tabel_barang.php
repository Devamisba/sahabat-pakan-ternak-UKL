<!DOCTYPE html>
<html>
<head>
    <title>Tabel Barang</title>
    <link rel="website icon" type="png" href="sahabat-high-resolution-logo-transparent.png">
    <link rel="stylesheet" href="">
</head>
<body>
    <h2>Tabel Barang</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama barang</th>
            <th>Jenis barang</th>
            <th>Harga</th> 
            <th>Action</th>   
        </tr>
       
        <?php
        require "koneksi_database.php";
        $sql = mysqli_query($mysqli, "SELECT * FROM barang");

        if ($sql) {
            while($row = mysqli_fetch_assoc($sql)) {

                $id_pakan = $row['id_pakan'];
                $nama = $row['nama'];
                $jenis = $row['jenis'];
                $harga = $row['harga'];
                echo "<tr>
                        <td>".$row["id_pakan"]."</td>
                        <td>".$row["nama"]."</td>
                        <td>".$row["jenis"]."</td>
                        <td>".$row["harga"]."</td>
                        <td>
                            <a href='edit_barang.php?id=".$row["id_pakan"]."' class='edit'>Edit</a> | 
                            <a href='delete_barang.php?id=".$row["id_pakan"]."' class='delete'>Delete</a>
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
        <a href="tambah_barang.php">ADD</a>
    </tr>
</body>
</html>