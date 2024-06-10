<?php
include 'koneksi_database.php';

if (isset($_GET['id'])) {
    $id_pakan= $_GET['id'];

    $sql = "SELECT * FROM pakan WHERE id_pakan=$id_pakan";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No pakan found";
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $foto = $_POST['foto'];
    $nama = $_POST['nama'];
    $expired = $_POST['expired'];

    $sql = "UPDATE pakan SET foto='$foto', nama='$nama', expired='$expired' WHERE id_pakan=$id";

    if ($mysqli->query($sql) === TRUE) {
        header("Location: tabel pakan.php");
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Pakan</title>
</head>
<body>
    <h2>Update Pakan</h2>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $row['id_pakan']; ?>">
        Foto: <input type="text" name="foto" value="<?php echo $row['foto']; ?>" required><br>
        Nama: <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required><br>
        Expired: <input type="text" name="expired" value="<?php echo $row['expired']; ?>" required><br>
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>