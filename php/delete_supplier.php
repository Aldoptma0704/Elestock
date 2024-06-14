<?php
include 'Koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM suppliers WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo "Suppliers berhasil dihapus";
    }else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
header("Location: supplier.php");
exit;
?>