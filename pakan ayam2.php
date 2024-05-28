<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="website icon" type="png" href="sahabat-high-resolution-logo-transparent.png">
  <title>pakan ayam2</title>
  <link rel="stylesheet" href="pakan ayam2.css">
</head>
<body>

      <nav class="navbar">
        <a href="index2.php" class="navbar-logo"><img src="sahabat-high-resolution-logo-transparent.png"></a>
       
        <div class="navbar-nav">
        <a href="tentang kami2.php">Tentang Kami</a>
            <div class="dropdown">
                <button class="dropbtn">Produk</button>
                <div class="dropdown-content">
                  <a href="pakan ayam2.php">Pakan Ayam</a>
                  <a href="pakan bebek2.php">Pakan Bebek</a>
                  <a href="pakan babi2.php">Pakan Babi</a>
                </div>
              </div>
            <a href="contact us2.php">Kontak Kami</a>
            <a href="profil saya2.php">Profil</a>
        </div>
        
        <ul style="list-style: none;">
          <a href="index.php"><li><button class="login-button">Logout</button></li></a>
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
        <a href="https://wa.me/qr/PSWQPTCGM2THB1" class="btn">Beli</a>
      </div>
    <?php } ?>
  </div>

  <footer>
        <p style="margin-top: 20px; font-size: 0.9em;" align="center" >&copy; 2024 Sahabat Pakan Ternak. All Rights Reserved.</p>
  </footer>
  
</body>
</html>