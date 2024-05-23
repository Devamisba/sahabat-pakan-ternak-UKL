<?php


$host = "localhost";
$name = "root";
$password = "";
$db = "ukl"; 

$mysqli =mysqli_connect($host, $name, $password, $db);

function  registrasi($data) { 
    
    global $mysqli;

    $name = $data["nama"];
    $nomor_telepon = $data["nomor_telepon"];
    $alamat = $data["alamat"];
    $email = $data["email"];
    $password = $data["password"];
    $role = $data["role"];
    
        $result = mysqli_query($mysqli, "INSERT INTO user VALUES ('$name','$nomor_telepon','$alamat','$email','$password','$role')");
        return mysqli_affected_rows($mysqli);

    if (mysqli_fetch_assoc($result)) {
        echo "registrasi berhasil";
        return false;
    }
}
?>