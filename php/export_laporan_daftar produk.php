<?php
include('Koneksi.php');

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="Daftar Produk.csv"');


$output = fopen('php://output', 'w');

fputcsv($output, array('ID', 'Nama', 'Kategori', 'Spesifikasi', 'Stok', 'Lokasi', 'Tanggal Update'));

$result = $conn->query("SELECT products.id, products.name, products.category, products.specification, products.stock, locations.name AS location_name FROM products JOIN locations ON products.location_id = locations.id");

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, $row);
    }
} else {
    echo "No data found";
}

fclose($output);

?>