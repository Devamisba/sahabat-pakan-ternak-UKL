<?php
include 'koneksi_database.php';

if (isset($_GET['id'])) {
    $id_pemesanan= $_GET['id'];

    $sql = "SELECT * FROM pemesanan WHERE id_pemesanan=$id_pemesanan";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No pemesanan found";
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $POST['nama'];
    $telepon = $POST['telepon'];
    $alamat = $POST['alamat'];
    $id_kategori = $POST['id_kategori'];
    $jumlah = $POST['jumlah'];
    $total = $POST['total'];
    $pembayaran = $POST['pembayaran'];;

    $sql = "UPDATE pemesanan SET nama='$nama', telepon='$telepon', alamat='$alamat', id_kategori='$id_kategori', jumlah='$jumlah', total='$total', pembayaran='$pembayaran', WHERE id_pemesanan=$id";

    if ($mysqli->query($sql) === TRUE) {
        header("Location: tabel pemesanan.php");
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update pemesanan</title>
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

form {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    max-width: 600px;
    margin: 0 auto;
}

form input[type="text"],
form input[type="number"],
form input[type="email"],
form input[type="password"],
form select {
    width: calc(100% - 22px);
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
}

form input[type="submit"] {
    background-color: #3498db;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
}

form input[type="submit"]:hover {
    background-color: #2980b9;
}

    </style>
</head>
<body>
    <h2>Update pemesanan</h2>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $row['id_pemesanan']; ?>">
        Nama: <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required><br>
        Telepon: <input type="number" name="telepon" value="<?php echo $row['telepon']; ?>" required><br>
        Alamat: <input type="text" name="alamat" value="<?php echo $row['alamat']; ?>" required><br>
        ID Kategori: <input type="number" name="id_kategori" value="<?php echo $row['id_kategori']; ?>" required><br>
        Jumlah: <input type="number" name="jumlah" value="<?php echo $row['jumlah']; ?>" required><br>
        Total: <input type="number" name="total" value="<?php echo $row['total']; ?>" required><br>
        Pembayaran: <input type="text" name="pembayaran" value="<?php echo $row['pembayaran']; ?>" required><br>
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>