<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Join Transaksi</title>
    <link rel="website icon" type="png" href="sahabat-high-resolution-logo-transparent.png">
    <link rel="stylesheet" href="">
    </head> 
    <body>
    <div class="servicess">
        <a href="index2.php" class="learn-isi"><button>Back</button></a>
        <a href="index2.php" class="learn-isi"><button>Home</button></a>
    </div>
    <h3 class="judul">DATA TRANSAKSI</h3>
    <br>
    <div class="tabel">
    <table border="1">   
    <tr>
        <th>Id Transaksi</th>
        <th>Id Username</th>
        <th>Username</th>
        <th>Nomor Telepon</th>
        <th>Alamat</th>
        <th>Email</th>
        <th>Id Pakan</th>
        <th>Nama Pakan</th>
        <th>Jenis Pakan</th>
        <th>Harga Pakan</th>
        <th>Tanggal Transaksi</th>
        <th>Nomor Rekening</th>
        <th>Tonase</th>
        <th>Total Harga</th>
        <th colspan="2">Action</th>            
    </tr>
    </div>
    <?php
        include 'koneksi.php';
        $query = "SELECT transaksi.id_transaksi, user.id_user, user.username, user.nomor_telepon, user.alamat,user.email, barang.id_pakan,barang.nama,barang.jenis,barang.harga,transaksi.tanggal_transaksi,transaksi.nomor_rekening,transaksi.tonase,transaksi.total_harga 
        FROM transaksi
        INNER JOIN user ON transaksi.id_transaksi = user.id_user
        JOIN barang ON barang.id_pakan = transaksi.id_pakan;";
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        while ($data = mysqli_fetch_array($result)) {
        ?>
    <tr>
        <td><?php echo $data['id_transaksi']; ?></td>
        <td><?php echo $data['id_username']; ?></td>
        <td><?php echo $data['username']; ?></td>
        <td><?php echo $data['nomor_telepon']; ?></td>
        <td><?php echo $data['alamat']; ?></td>
        <td><?php echo $data['email']; ?></td>
        <td><?php echo $data['id_pakan']; ?></td>
        <td><?php echo $data['nama']; ?></td>
        <td><?php echo $data['jenis']; ?></td>
        <td><?php echo $data['harga']; ?></td>
        <td><?php echo $data['tanggal_transaksi']; ?></td>
        <td><?php echo $data['nomor_rekening']; ?></td>
        <td><?php echo $data['tonase']; ?></td>
        <td><?php echo $data['total_harga']; ?></td>
        <td><a href='edit_data_transaksi.php?id_transaksi=<?php echo $data['id_transaksi'];?>'>Edit</a></td>
        <?php  ?>
        <td><a href='delete_user.php?id=<?php echo $data['id_transaksi'];?>'>Hapus</a></td>
        <td><a href='delete_barang.php?id=<?php echo $data['id_transaksi'];?>'>Hapus</a></td>
        <?php }?>
    </tr>

</table>
</html>