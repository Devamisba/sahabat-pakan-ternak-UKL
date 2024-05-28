<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="website icon" type="png" href="sahabat-high-resolution-logo-transparent.png">
  <title>pakan ayam</title>
  <link rel="stylesheet" href="pakan ayam.css">
</head>
<body>

      <nav class="navbar">
        <a href="index.php" class="navbar-logo"><img src="sahabat-high-resolution-logo-transparent.png"></a>

        <div class="navbar-nav">
        <a href="tentang kami.php">Tentang Kami</a>
            <div class="dropdown">
                <button class="dropbtn">Produk</button>
                <div class="dropdown-content">
                  <a href="pakan ayam.php">Pakan Ayam</a>
                  <a href="pakan bebek.php">Pakan Bebek</a>
                  <a href="pakan babi.php">Pakan Babi</a>
                </div>
              </div>
            <a href="contact us.php">Kontak Kami</a>
            <a href="profil saya.php">Profil</a>
        </div>
        
        <ul style="list-style: none;">
          <a href="login.php"><li><button class="login-button">Login</button></li></a>
      </ul>
        
        
    </nav>

    <br>
    <br>
    <br>
    <br>


 
<div class="row">
    <?php
    
      // isi nama host, username mysql, dan password mysql anda
      $hostname = "localhost";
      $username = "root";
      $password = "";
      $database = "ukl";

      
      // Membuat koneksi
      $mysqli = mysqli_connect($hostname, $username, $password, $database);

      $result = mysqli_query($mysqli, "SELECT * FROM pakanayam") or die (mysqli_error());

      while ($data = mysqli_fetch_array($result)) {
    ?>
      <div class="box">
        <img src="<?php echo $data['foto'] ?>">
        <h3><?php echo $data['nama']; ?></h3>
        <p><?php echo $data['deskripsi']; ?></p>
        <div class="button"></div>
        <a href="login.php" class="btn">Beli</a>
      </div>
    <?php } ?>
  </div>

  <footer>
        <p style="margin-top: 20px; font-size: 0.9em;" align="center" >&copy; 2024 Sahabat Pakan Ternak. All Rights Reserved.</p>
  </footer>

</body>
</html>