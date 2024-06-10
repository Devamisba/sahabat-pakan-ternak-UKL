<?php
include 'koneksi_database.php';

if (isset($_GET['id'])) {
    $id_user= $_GET['id'];

    $sql = "SELECT * FROM userr WHERE id_user=$id_user";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No user found";
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $notelp = $_POST['notelp'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $sql = "UPDATE userr SET username='$username', nomor_telepon='$notelp', alamat='$alamat', email='$email', password='$password', role='$role' WHERE id_user=$id";

    if ($mysqli->query($sql) === TRUE) {
        header("Location: tabel user.php");
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
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

form {
    background-color: #fff;
    padding: 20px;
    margin: 20px 0;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    border-radius: 8px;
}

form input[type="text"],
form input[type="number"],
form input[type="email"],
form input[type="password"],
form select {
    width: calc(100% - 22px); /* Adjust width to accommodate padding and border */
    padding: 10px;
    margin: 8px 0;
    display: block;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
}

form input[type="submit"] {
    background-color: #3498db;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-top: 10px;
}

form input[type="submit"]:hover {
    background-color: #2980b9;
}

    </style>
</head>
<body>
    <h2>Update User</h2>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $row['id_user']; ?>">
        Username: <input type="text" name="username" value="<?php echo $row['username']; ?>" required><br>
        Nomor_telepon: <input type="number" name="notelp" value="<?php echo $row['nomor_telepon']; ?>" required><br>
        Alamat: <input type="text" name="alamat" value="<?php echo $row['alamat']; ?>" required><br>
        Email: <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br>
        Password: <input type="password" name="password" value="<?php echo $row['password']; ?>" required><br>
        Role: 
        <select name="role" required>
            <option value="user" <?php if($row['role'] == 'user') echo 'selected'; ?>>User</option>
            <option value="admin" <?php if($row['role'] == 'admin') echo 'selected'; ?>>Admin</option>
        </select><br>
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>