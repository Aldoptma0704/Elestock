<?php
include 'Koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo "Produk berhasil dihapus";
    }else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
header("Location: dashboard.php");
exit;
?>