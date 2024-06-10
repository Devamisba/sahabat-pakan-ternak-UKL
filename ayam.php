<?php
include 'koneksi_database.php';

$id_kategori = 1; // ID kategori untuk Pakan Ayam

// Mengambil data kategori
$sql_kategori = "SELECT * FROM kategori WHERE id_kategori='$id_kategori'";
$result_kategori = $mysqli->query($sql_kategori);

if ($result_kategori->num_rows > 0) {
    $kategori = $result_kategori->fetch_assoc();
} else {
    die("Kategori tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pakan Ayam</title>
    <link rel="website icon" type="png" href="sahabat-high-resolution-logo-transparent.png">
    <style>
        body {
            font-family: 'poppins', sans-serif;
            background-image: url('gudang\ pakan.jpeg');
            background-repeat: no-repeat;
            background-size: cover;
        }
        .navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: fixed;
    top:0;
    left: 0;
    right: 0;
    padding-right: 10px;
    
}

img {
    width: 60%;
    height: 60%;
    padding-left: 40px;
  }

  .navbar-nav a:hover {
    font-size: 21px;
    margin: 0;
    color: #ff0000;
    transition: 0.1s linear ;
}

.navbar-nav a {
    color: #ffffff;
    text-decoration: none;
    font-weight: 100;
    font-size: 21px;
}

.navbar-nav {
    display: flex;
    width: 10000px;
    justify-content: space-around;
    padding-left: 150px;
    
}

button {
    color: #ffffff;
}

.login-button{
    background-color: transparent;
    border: 1.8px solid #ffffff;
    border-radius: 5em;
    padding: 0.2rem 0.6rem;
    font-size: 15px;
}

.login-button:hover {
    color: #ffffff;
    background-color: #a72828;
    transition: all ease-in-out 350ms;
}

/* Dropdown Button */
.dropbtn {
    color: #ffffff;
    font-size: 21px;
    border: none;
    background-color: transparent;
}
  
/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
    
}
  
/* Dropdown Content */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}
  
/* Link */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}
  
/* Change color of dropdown links on hover */
.dropdown-content a:hover {
    background-color: #ffffff;
}
  
/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;
}
  
/* Change the background color of the dropdown button when the dropdown content is shown */
  .dropdown:hover .dropbtn {
    background-color: rgb(0, 0, 0);
}
        h2 {
            text-align: center;
            margin-top: 20px;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #f2f2f2;
            opacity: 85%; 
            padding-top: 10em;
        }

        table th, table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #f2f2f2;
        }

        .fto {
            max-width: 200px;
            border-radius: 10px;
        }

        form {
            margin-top: 10px;
        }

        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        h2 {
            padding-top: 10em;
            color: white;
        }

    </style>
</head>
<body>

<nav class="navbar">
            <a href="index.php" class="navbar-logo"><img src="sahabat-high-resolution-logo-transparent.png" alt=""></a>
    
            <div class="navbar-nav">
            <a href="tentang kami.php">Tentang Kami</a>
            <div class="dropdown">
                <button class="dropbtn">Produk</button>
                <div class="dropdown-content">
                  <a href="ayam.php">Pakan Ayam</a>
                  <a href="bebek.php">Pakan Bebek</a>
                </div>
              </div>
            <a href="contact us.php">Kontak Kami</a>
            <a href="profil saya.php">Profil</a>
        </div>
        
        <ul style="list-style: none;">
          <a href="index.php"><li><button class="login-button">Logout</button></li></a>
      </ul>
            
            
        </nav>

<h2>Pakan Ayam</h2>

<table>
    <tr>
        <th>Foto</th>
        <th>Nama</th>
        <th>Jenis</th>
        <th>Deskripsi</th>
        <th>Stok</th>
        <th>Harga per Ton</th>
        <th>Action</th>
    </tr>
    <tr>
        <td><img class="fto" src="<?php echo $kategori['foto']; ?>" alt="Foto"></td>
        <td><?php echo $kategori['nama']; ?></td>
        <td><?php echo $kategori['jenis']; ?></td>
        <td><?php echo $kategori['deskripsi']; ?></td>
        <td><?php echo $kategori['stok']; ?></td>
        <td><?php echo $kategori['harga_perton']; ?></td>
        <td>
            <form method='POST' action='proses_pesan.php'>
                <input type='hidden' name='id_kategori' value='<?php echo $kategori["id_kategori"]; ?>'>
                <input type='hidden' name='harga_perton' value='<?php echo $kategori["harga_perton"]; ?>'>
                Nama: <input type='text' name='nama' required><br>
                Telepon: <input type='text' name='telepon' required><br>
                Alamat: <input type='text' name='alamat' required><br>
                Jumlah (ton): <input type='number' name='jumlah' min='1' required><br>
                Pembayaran: <input type='text' name='pembayaran' required><br>
                <input type='submit' value='Beli'>
            </form>
        </td>
    </tr>
</table>

</body>
</html>
