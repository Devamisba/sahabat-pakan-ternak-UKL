<?php
include 'koneksi_database.php';

$errors = [];
$success = "";
$total = 0.00;

// Proses pembelian
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'] ?? '';
    $telepon = $_POST['telepon'] ?? '';
    $alamat = $_POST['alamat'] ?? '';
    $id_kategori = $_POST['id_kategori'] ?? '';
    $jumlah = $_POST['jumlah'] ?? '';
    $harga_per_ton = $_POST['harga_per_ton'] ?? '';
    $pembayaran = $_POST['pembayaran'] ?? '';

    // Validasi input
    if (!empty($nama) && !empty($telepon) && !empty($alamat) && !empty($id_kategori) && !empty($jumlah) && !empty($harga_per_ton) && !empty($pembayaran)) {
        // Mendapatkan stok terkini dari database
        $sql_stok = "SELECT stok FROM kategori WHERE id_kategori='$id_kategori'";
        $result_stok = $mysqli->query($sql_stok);
        if ($result_stok->num_rows > 0) {
            $row_stok = $result_stok->fetch_assoc();
            $stok_sekarang = $row_stok['stok'];

            // Periksa apakah stok mencukupi
            if ($stok_sekarang >= $jumlah) {
                $total = $jumlah * $harga_per_ton;
                $total_formatted = number_format($total, 6, '.', '');

                // Menyimpan data pemesanan
                $sql_pemesanan = "INSERT INTO pemesanan (nama, telepon, alamat, id_kategori, jumlah, total, pembayaran)
                                  VALUES ('$nama', '$telepon', '$alamat', '$id_kategori', '$jumlah', '$total_formatted', '$pembayaran')";

                if ($mysqli->query($sql_pemesanan) === TRUE) {
                    // Mengurangi stok
                    $sql_update_stok = "UPDATE kategori SET stok = stok - $jumlah WHERE id_kategori = $id_kategori";
                    if ($mysqli->query($sql_update_stok) === TRUE) {
                        $success = "Pembelian berhasil!";
                    } else {
                        $errors[] = "Gagal mengurangi stok: " . $mysqli->error;
                    }
                } else {
                    $errors[] = "Error: " . $sql_pemesanan . "<br>" . $mysqli->error;
                }
            } else {
                $errors[] = "Stok tidak mencukupi.";
            }
        } else {
            $errors[] = "Kategori tidak ditemukan.";
        }
    } else {
        $errors[] = "Harap isi semua kolom.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembelian</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        .error-messages {
            color: red;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .success-message {
            color: green;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .receipt {
            background-color: #ffffff;
            border: 1px solid #dee2e6;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .receipt h2 {
            margin-top: 0;
            color: #343a40;
        }

        .receipt p {
            margin: 5px 0;
            color: #495057;
        }
    </style>
</head>
<body>
<div class="container">
    <?php
    if (!empty($errors)) {
        echo "<div class='error-messages'><ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul></div>";
    }

    if (!empty($success)) {
        // Menampilkan struk
        echo "<div class='success-message'>$success</div>";
        echo "<div class='receipt'>";
        echo "<h2>Struk Pembelian</h2>";
        echo "<p>Nama: $nama</p>";
        echo "<p>Telepon: $telepon</p>";
        echo "<p>Alamat: $alamat</p>";

        // Query untuk mengambil informasi produk dari database
        $sql_produk = "SELECT nama, jenis, deskripsi FROM kategori WHERE id_kategori='$id_kategori'";
        $result_produk = $mysqli->query($sql_produk);
        if ($result_produk->num_rows > 0) {
            $row_produk = $result_produk->fetch_assoc();
            echo "<p>Nama Produk: " . $row_produk['nama'] . "</p>";
            echo "<p>Jenis Produk: " . $row_produk['jenis'] . "</p>";
            echo "<p>Deskripsi: " . $row_produk['deskripsi'] . "</p>";
        }

        echo "<p>Jumlah: $jumlah</p>";
        echo "<p>Total: $total juta</p>";
        echo "<p>Pembayaran: $pembayaran</p>";
        echo "<p>untuk info lebih lanjut tentang pengiriman hubungi WA: 0895322202314</p>";
        echo "</div>";
    }
    ?>
</div>
</body>
</html>
