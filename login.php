<?php
$mysqli = new mysqli('localhost', 'root', '', 'ukl');

if(isset($_POST["login"])){

$name= $_POST["nama"];
$password= $_POST["password"];

$result = mysqli_query($mysqli," SELECT * FROM user WHERE Username= '$name' AND password='$password' ");

//cek username
if( mysqli_num_rows($result ) === 1){
$row =mysqli_fetch_assoc($result );

if($row['role']=="admin"){

    // buat session login dan username
    $_SESSION['nama'] = $name;
    $_SESSION['password'] = $password;
    $_SESSION['role'] = "admin";
    header("location:admin.php");
    
    // cek jika usser login sebagai user
}elseif($row['role']=="user"){
    // buat session login dan username
    $_SESSION['nama'] = $name;
    $_SESSION['password'] = $password;
    $_SESSION['role'] = "user";
    // alihkan ke halaman dashboard user
    header("location:index2.php");

}else{
    // alihkan ke halaman login kembali
    header("location:login.php");
}
}else{
header("location:login.php?pesan=gagal");
}
    exit;
    $error=true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <style>
        body {
    font-family: 'poppins', sans-serif;
    background-image: url('tom-winckels-I7oLRdM9YIw-unsplash.jpg');
    background-repeat: no-repeat;
    background-size: cover;
}

        button {
    color: rgb(0, 0, 0);
    border-color: #008a5c;
}

table {
    background: transparent;
    backdrop-filter: blur(10px);
    border: 1px solid gray;
    border-radius: 13px;
}

h3 {
    color: white;
}

.loginn {
    padding-top: 3em;
}




    </style>
</head>



<body>
   
<div align="center" class="loginn">
         <table>
            
         <h1>LOGIN</h1>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama" required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" required></td>
                </tr>

                <tr>
                    <td><button class="submit" name="login">Login</button></td>
                </tr>
                </table>

                <div align="center" class="keregbaru">
                    <h3>Tidak ada akun? </h3>
                    <button><a href="register.php">Register</a></button>
                </div>  


                </form>

                </div>
    
</body>
</html>