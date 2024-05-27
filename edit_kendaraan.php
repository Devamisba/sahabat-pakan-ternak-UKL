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
    $sql = "SELECT * FROM kendaraan WHERE id_kendaraan = $id";
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
    $plat = $_POST['plat'];

    $sql = "UPDATE kendaraan SET nama='$nama', jenis='$jenis', plat='$plat' WHERE id_kendaraan=$id";

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
    <title>Update Kendaraan</title>
</head>
<body>
    <h2>Update Kendaraan</h2>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $row['id_kendaraan']; ?>">
        Nama: <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required><br>
        Jenis: <input type="text" name="jenis" value="<?php echo $row['jenis']; ?>" required><br>
        Plat: <input type="text" name="plat" value="<?php echo $row['plat']; ?>" required><br>
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>
