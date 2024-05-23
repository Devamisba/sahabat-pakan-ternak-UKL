<!DOCTYPE html>
<html>
<head>
    <title>Tabel User</title>
    <link rel="website icon" type="png" href="sahabat-high-resolution-logo-transparent.png">
    <link rel="stylesheet" href="">
</head>
<body>
    <h2>Tabel User</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Nomor_telepon</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>Password</th>
            <th>Role</th>
            <th>Action</th> 
            
        </tr>
       
        <?php
        require "koneksi_database.php";
        $sql = mysqli_query($mysqli, "SELECT * FROM user");

        if ($sql) {
            while($row = mysqli_fetch_assoc($sql)) {

                $id_user = $row['id_user'];
                $username = $row['username'];
                $nomor_telepon = $row['nomor_telepon'];
                $alamat = $row['alamat'];
                $email = $row['email'];
                $password = $row['password'];
                $role = $row['role'];
                echo "<tr>
                        <td>".$row["id_user"]."</td>
                        <td>".$row["username"]."</td>
                        <td>".$row["nomor_telepon"]."</td>
                        <td>".$row["alamat"]."</td>
                        <td>".$row["email"]."</td>
                        <td>".$row["password"]."</td>
                        <td>".$row["role"]."</td>
                        <td>
                            <a href='edit.php?id=".$row["id_user"]."' class='edit'>Edit</a> | 
                            <a href='delete.php?id=".$row["id_user"]."' class='delete'>Delete</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>0 results</td></tr>";
        }
        
        ?>
    </table>
    <tr>
        <a href="admin.php">kembali</a>
    </tr>
</body>
</html>