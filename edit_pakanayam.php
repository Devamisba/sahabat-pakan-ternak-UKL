<?php
// Database connection
$host = "localhost";
$username = "root";
$password = "";
$database = "ukl";

$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data to be edited
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM pakanayam WHERE id_ayam = $id";
    $result = $conn->query($sql);

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
    $deskripsi = $_POST['deskripsi'];
    $harga_perkilo = $_POST['harga_perkilo'];

    $sql = "UPDATE pakanayam SET foto='$foto', nama='$nama', deskripsi='$deskripsi', harga_perkilo='$harga_perkilo' WHERE id_ayam=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Pakan Ayam</title>
</head>
<body>
    <h2>Update Pakan Ayam</h2>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $row['id_ayam']; ?>">
        Foto: <input type="text" name="foto" value="<?php echo $row['foto']; ?>" required><br>
        Nama: <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required><br>
        eskripsi: <input type="text" name="deskripsi" value="<?php echo $row['deskripsi']; ?>" required><br>
        Harga Perkilo: <input type="text" name="harga_perkilo" value="<?php echo $row['harga_perkilo']; ?>" required><br>
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>