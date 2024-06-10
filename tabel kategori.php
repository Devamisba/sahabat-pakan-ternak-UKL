<!DOCTYPE html>
<html>
<head>
    <title>Tabel Barang</title>
    <link rel="website icon" type="png" href="sahabat-high-resolution-logo-transparent.png">
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f9;
    color: #333;
    margin: 0;
    padding: 20px;
}

h2 {
    color: #444;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

th, td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #f8f8f8;
    font-weight: bold;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #f1f1f1;
}

a {
    color: #3498db;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

.edit {
    color: #27ae60;
}

.delete {
    color: #e74c3c;
}

.actions {
    margin-top: 20px;
}

.actions a {
    display: inline-block;
    margin-right: 10px;
    padding: 10px 15px;
    background-color: #3498db;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
}

.actions a:hover {
    background-color: #2980b9;
}

    </style>
</head>
<body>
    <h2>Tabel Barang</h2>
    <table border="1">
        <tr>
            <th>ID Kategori</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>Jenis</th> 
            <th>Deskripsi</th>   
            <th>Stok</th>   
            <th>Harga Perton</th>   
        </tr>
       
        <?php
        require "koneksi_database.php";
        $sql = mysqli_query($mysqli, "SELECT * FROM kategori");

        if ($sql) {
            while($row = mysqli_fetch_assoc($sql)) {

                $id_kategori = $row['id_kategori'];
                $foto = $row['foto'];
                $nama = $row['nama'];
                $jenis = $row['jenis'];
                $deskripsi = $row['deskripsi'];
                $stok = $row['stok'];
                $harga_per_ton = $row['harga_perton'];
                echo "<tr>
                        <td>".$row["id_kategori"]."</td>
                        <td>".$row["foto"]."</td>
                        <td>".$row["nama"]."</td>
                        <td>".$row["jenis"]."</td>
                        <td>".$row["deskripsi"]."</td>
                        <td>".$row["stok"]."</td>
                        <td>".$row["harga_perton"]."</td>
                        <td>
                            <a href='edit kategori.php?id=".$row["id_kategori"]."' class='edit'>Edit</a> | 
                            <a href='delete kategori.php?id=".$row["id_kategori"]."' class='delete'>Delete</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>0 results</td></tr>";
        }
        
        ?>
    </table>
    <tr>
        <a href="admin.php">Kembali</a>
        <a href="tambah kategori.php">ADD</a>
    </tr>
</body>
</html>