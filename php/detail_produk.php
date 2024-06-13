<?php include('Koneksi.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/dashboard.css">
    <title>Detail Produk</title>
</head>
<body>
    <?php
    include 'navbardashboard_user.php';

    $product_id = isset($_GET['id']) ? $_GET['id'] : 0;
    $product_result = $conn->query("SELECT * FROM products WHERE id = $product_id");

    if ($product_result->num_rows > 0) {
        $product = $product_result->fetch_assoc();
        $location_id = $product['location_id'];
        $location_result = $conn->query("SELECT * FROM locations WHERE id = $location_id");
        $location = $location_result->num_rows > 0 ? $location_result->fetch_assoc() : ['name' => 'Unknown', 'description' => 'No description available'];
    } else {
        echo "<p class='text-center'>Product not found</p>";
        exit;
    }
    ?>

    <main>
        <div class="container pt-5">
            <h1>Detail Produk</h1>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $product['name']; ?></h5>
                    <p class="card-text"><strong>Kategori:</strong> <?php echo $product['category']; ?></p>
                    <p class="card-text"><strong>Spesifikasi:</strong> <?php echo $product['specification']; ?></p>
                    <p class="card-text"><strong>Stok:</strong> <?php echo $product['stock']; ?></p>
                    <h5 class="mt-4">Lokasi</h5>
                    <p class="card-text"><strong>Nama:</strong> <?php echo $location['name']; ?></p>
                    <p class="card-text"><strong>Deskripsi:</strong> <?php echo $location['description']; ?></p>
                    <a href="../php/HomePage.php" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
