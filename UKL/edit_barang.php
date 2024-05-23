<?php
include 'koneksi_database.php';

if (isset($_GET['id'])) {
    $id_user= $_GET['id'];

    $sql = "SELECT * FROM barang WHERE id_pakan=$id_pakan";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No barang found";
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];

    $sql = "UPDATE barang SET nama='$nama', jenis='$jenis', harga='$harga', WHERE id_pakan=$id";

    if ($mysqli->query($sql) === TRUE) {
        header("Location: barang.php");
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Barang</title>
</head>
<body>
    <h2>Update Barang</h2>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $row['id_pakan']; ?>">
        Nama: <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required><br>
        Jenis: <input type="text" name="jenis" value="<?php echo $row['jenis']; ?>" required><br>
        Alamat: <input type="text" name="harga" value="<?php echo $row['harga']; ?>" required><br>
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>