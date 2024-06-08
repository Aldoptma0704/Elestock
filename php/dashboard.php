<?php include('Koneksi.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/dashboard.css">
    <title>Dashboard</title>
</head>
<body>
    <?php
    include 'navbardashboard.php';
    ?>

    <main>
        <div class="container pt-5">
            <h2 class="text-center">Daftar Produk</h2>
            <a href="tambah_produk.php" class="btn btn-success mb-3">Tambah Produk</a>
            <table class="table">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Spesifikasi</th>
                        <th>Stok</th>
                        <th>Lokasi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $result = $conn->query("SELECT * FROM products");
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $location_id = $row["location_id"];
                            $location_result = $conn->query("SELECT name FROM locations WHERE id = $location_id");
                            $location_name = $location_result->num_rows > 0 ? $location_result->fetch_assoc()["name"] : "Unknown";
                            
                            echo "<tr>
                                <td>".$row["id"]."</td>
                                <td>".$row["name"]."</td>
                                <td>".$row["category"]."</td>
                                <td>".$row["specification"]."</td>
                                <td>".$row["stock"]."</td>
                                <td>".$location_name."</td>
                                <td>
                                    <a href='editproduka.php?id=".$row["id"]."' class='btn btn-warning btn-sm'>Edit</a>
                                    <a href='delete_produk.php?id=".$row["id"]."' class='btn btn-danger btn-sm'>Delete</a>
                                </td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7' class='text-center'>No products found</td></tr>";
                    }
                ?>
                </tbody>
            </table>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
