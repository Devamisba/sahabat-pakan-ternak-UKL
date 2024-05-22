<?php include 'koneksi database.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Read Users</title>
    <link rel="stylesheet" href="">
</head>
<body>
    <h2>Read Users</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Nomor_telepon</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>Password</th>
            <th>Role</th>
            <th>Actions</th> 
            
        </tr>
       
        <?php
        $sql = "SELECT * FROM user";
        $result = $mysql->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
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
                            <a href='deleteuser.php?id=".$row["id_user"]."' class='delete'>Delete</a>
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