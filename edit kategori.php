<?php
include 'koneksi_database.php';

// Fetch data to be edited
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM kategori WHERE id_kategori = $id";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Data not found";
        exit;
    }
}

// Update data
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $foto = $_POST['foto'];
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $deskripsi = $_POST['deskripsi'];
    $stok = $_POST['stok'];
    $harga_perton = $_POST['harga_perton'];

    $sql = "UPDATE kategori SET foto='$foto', nama='$nama', jenis='$jenis', deskripsi='$deskripsi', stok='$stok', harga_perton='$harga_perton' WHERE id_kategori=$id";

    if ($mysqli->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $mysqli->error;
    }
}

$mysqli->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Kategori</title>
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
}

form {
    background-color: #fff;
    padding: 20px;
    margin: 0 auto;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    border-radius: 5px;
    max-width: 400px;
}

label {
    display: block;
    margin-top: 10px;
    font-weight: bold;
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

input[type="submit"] {
    background-color: #3498db;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-top: 10px;
    width: 100%;
}

input[type="submit"]:hover {
    background-color: #2980b9;
}

    </style>
</head>
<body>
    <h2>Update Kategori</h2>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $row['id_kategori']; ?>">
        Foto: <input type="text" name="foto" value="<?php echo $row['foto']; ?>" required><br>
        Nama: <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required><br>
        jenis: <input type="text" name="jenis" value="<?php echo $row['jenis']; ?>" required><br>
        Deskripsi: <input type="text" name="deskripsi" value="<?php echo $row['deskripsi']; ?>" required><br>
        Stok: <input type="text" name="stok" value="<?php echo $row['stok']; ?>" required><br>
        Harga Perton: <input type="number" name="harga_perton" value="<?php echo $row['harga_perton']; ?>" required><br>
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>