<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'web_tarian');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$id_transaksi = $_POST['id_transaksi'];
$payment_method = $_POST['payment_method'];
$payment_details = $_POST['payment_details'];

// Update transaction status using prepared statements
$sql = $conn->prepare("UPDATE transaksi SET payment_method = ?, payment_details = ?, status = 'paid' WHERE id_transaksi = ?");
$sql->bind_param("ssi", $payment_method, $payment_details, $id_transaksi);

if ($sql->execute() === TRUE) {
    // Redirect to the main page
    header("Location: tugas-sms-1.php");
    exit();
} else {
    echo "Error: " . $sql->error;
}

$sql->close();
$conn->close();
?>