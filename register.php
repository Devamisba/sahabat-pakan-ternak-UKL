<?php
            session_start();
            if(isset($_POST['submit'])) {
                $name = $_POST['nama'];
                $notelp = $_POST['notelp'];
                $alamat = $_POST['alamat'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $role = $_POST['role'];
                // masukkan sekali file koneksi db
                $mysqli = new mysqli('localhost', 'root', '', 'ukl');

                //insert data user ke db
                $result = mysqli_query($mysqli,"INSERT INTO user VALUES ('','$name','$notelp','$alamat','$email','$password','$role')");

                //tunjukkan pesan jika user telah ditambah
                echo "Data added successfully . <a href='index.php'>View Data</a>";
                header("location:login.php");
            };
            ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="register.css">
    <style>
table {
    background: transparent;
    backdrop-filter: blur(10px);
    border: 1px solid gray;
    border-radius: 13px;
}

.container {
    padding-top: 3em;
}
    </style>

    
</head>
<body>
    
    <div  align="center" class="container">
        <h1>REGISTER</h1>
        <form action="register.php" method="post">
            <table>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama" required></td>
                </tr>
                <tr>
                    <td>Nomor Telepon</td>
                    <td><input type="number" name="notelp" required></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" name="alamat" required></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" required></td>
                </tr>
                <tr>
                    <td>Role</td>
                    <td>
                        <select name="role" id="role" required>
                            <option disabled selected>Pilih</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><button class="submit" name="submit">Register</button></td>
                </tr>

            </table>
            <div class="keregbaru">
                    <h3 class="akun">Sudah ada akun? </h3>
                    <button><a href="login.php">Login</a></button>
                </div>

        </form>
    </div>
</body>
</html>