<!DOCTYPE html>
<html>
<head>
    <title>Tabel Pemesanan</title>
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
    text-align: center;
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

th, td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: left;
}

th {
    background-color: #3498db;
    color: white;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

a {
    text-decoration: none;
    color: #3498db;
}

a:hover {
    text-decoration: underline;
}

tr a.edit {
    color: #27ae60;
}

tr a.delete {
    color: #e74c3c;
}

tr a:hover {
    text-decoration: underline;
}

.button-container {
    text-align: center;
    margin-top: 20px;
}

.button-container a {
    background-color: #3498db;
    color: white;
    padding: 10px 15px;
    border-radius: 4px;
    text-decoration: none;
    margin: 0 5px;
}

.button-container a:hover {
    background-color: #2980b9;
}

    </style>
</head>
<body>
    <h2>Tabel Pemesanan</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Telepon</th>
            <th>Alamat</th>
            <th>ID Kategori</th> 
            <th>Jumlah</th> 
            <th>Total</th> 
            <th>Pembayaran</th> 
            <th>Action</th>   
        </tr>
       
        <?php
        require "koneksi_database.php";
        $sql = mysqli_query($mysqli, "SELECT * FROM pemesanan");

        if ($sql) {
            while($row = mysqli_fetch_assoc($sql)) {

                $id_kategori = $row['id_kategori'];
                $nama = $row['nama'];
                $telepon = $row['telepon'];
                $alamat = $row['alamat'];
                $id_kategori = $row['id_kategori'];
                $jumlah = $row['jumlah'];
                $total = $row['total'];
                $pembayaran = $row['pembayaran'];
                echo "<tr>
                        <td>".$row["id_kategori"]."</td>
                        <td>".$row["nama"]."</td>
                        <td>".$row["telepon"]."</td>
                        <td>".$row["alamat"]."</td>
                        <td>".$row["id_kategori"]."</td>
                        <td>".$row["jumlah"]."</td>
                        <td>".$row["total"]."</td>
                        <td>".$row["pembayaran"]."</td>
                        <td>
                            <a href='edit pemesanan.php?id=".$row["id_pemesanan"]."' class='edit'>Edit</a> | 
                            <a href='delete pemesanan.php?id=".$row["id_pemesanan"]."' class='delete'>Delete</a>
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
        <a href="tambah pemesanan.php">ADD</a>
    </tr>
</body>
</html>