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
    $sql = "SELECT * FROM barang WHERE id_pakan = $id";
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
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];

    $sql = "UPDATE barang SET nama='$nama', jenis='$jenis', harga='$harga' WHERE id_pakan=$id";

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
    <title>Update Barang</title>
</head>
<body>
    <h2>Update Barang</h2>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $row['id_pakan']; ?>">
        Nama: <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required><br>
        Jenis: <input type="text" name="jenis" value="<?php echo $row['jenis']; ?>" required><br>
        Harga: <input type="text" name="harga" value="<?php echo $row['harga']; ?>" required><br>
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>