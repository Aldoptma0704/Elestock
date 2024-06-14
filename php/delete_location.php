<?php
include 'Koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM locations WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo "Location berhasil dihapus";
    }else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
header("Location: location.php");
exit;
?>