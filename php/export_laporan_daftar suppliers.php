<?php
include('Koneksi.php');

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="Daftar Suppliers.csv"');


$output = fopen('php://output', 'w');

fputcsv($output, array('ID', 'Nama Produk', 'Contact_person', 'Email', 'Phone'));

$result = $conn->query("SELECT suppliers.id, suppliers.name, suppliers.contact_person, suppliers.email, suppliers.phone FROM suppliers");

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, $row);
    }
} else {
    echo "No data found";
}

fclose($output);

?>