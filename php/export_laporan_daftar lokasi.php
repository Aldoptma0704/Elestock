<?php
include('Koneksi.php');

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="Daftar Produk.csv"');


$output = fopen('php://output', 'w');

fputcsv($output, array('ID', 'Nama', 'Deskripsi'));

$result = $conn->query("SELECT locations.id, locations.name, locations.description AS location_name FROM locations");

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, $row);
    }
} else {
    echo "No data found";
}

fclose($output);

?>