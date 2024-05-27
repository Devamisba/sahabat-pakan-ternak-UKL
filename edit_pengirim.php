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
    $sql = "SELECT * FROM pengirim WHERE id_pengirim = $id";
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
    $alamat = $_POST['alamat'];
    $nomor_telepon = $_POST['nomor_telepon'];

    $sql = "UPDATE pengirim SET nama='$nama', alamat='$alamat', nomor_telepon='$nomor_telepon' WHERE id_pengirim=$id";

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
    <title>Update Pengirim</title>
</head>
<body>
    <h2>Update Pengirim</h2>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $row['id_pengirim']; ?>">
        Nama: <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required><br>
        Jenis: <input type="text" name="alamat" value="<?php echo $row['alamat']; ?>" required><br>
        Harga: <input type="text" name="nomor_telepon" value="<?php echo $row['nomor_telepon']; ?>" required><br>
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>