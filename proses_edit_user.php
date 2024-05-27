<?php

include("koneksi_database.php");

// kalau tidak ada id di query string

if(!isset($_GET['id']) ){ 
    header('Location: index.php');
}
$id=$_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM user WHERE id=$id");

while($user_data = mysqli_fetch_array($result))
{
$nama=$user_data['nama'];

$username = $user_data['username'];

$password = $user_data['password'];

$role=$user_data['role'];
}
?>