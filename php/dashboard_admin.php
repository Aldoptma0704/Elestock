<?php include('Koneksi.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/dashboard.css">
    <title>Admin Dashboard</title>
</head>
<body>
    <?php include 'navbardashboard_admin.php'; ?>
    <main>
        <div class="container pt-5">
            <h2 class="text-center">Admin Dashboard</h2>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Total Kategori Produk</h5>
                            <?php
                            $result = $conn->query("SELECT COUNT(*) as total FROM products");
                            $totalProduk = $result->fetch_assoc()['total'];
                            echo "<p class='card-text'>$totalProduk</p>";
                            ?>
                            <a href="dashboard.php" class="btn btn-primary">Lihat Produk</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Total Gudang</h5>
                            <?php
                            $result = $conn->query("SELECT COUNT(*) as total FROM locations");
                            $totalLokasi = $result->fetch_assoc()['total'];
                            echo "<p class='card-text'>$totalLokasi</p>";
                            ?>
                            <a href="location.php" class="btn btn-primary">Lihat Lokasi</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title">Total Suppliers</h5>
                            <?php
                            $result = $conn->query("SELECT COUNT(*) as total FROM suppliers");
                            $totalSuppliers = $result->fetch_assoc()['total'];
                            echo "<p class='card-text'>$totalSuppliers</p>";
                            ?>
                            <a href="supplier.php" class="btn btn-primary">Lihat Suppliers</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
