<!DOCTYPE html>
<html>
<head>
<link rel="website icon" type="png" href="sahabat-high-resolution-logo-transparent.png">
    <title>Tabel User</title>
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

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

th, td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #f8f8f8;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #f1f1f1;
}

a {
    color: #3498db;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

.edit {
    color: #27ae60;
}

.delete {
    color: #e74c3c;
}

a.back {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 15px;
    background-color: #3498db;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
}

a.back:hover {
    background-color: #2980b9;
}

    </style>
    
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
        $sql = mysqli_query($mysqli, "SELECT * FROM userr");

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