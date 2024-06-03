<?php include 'Koneksi.php' ; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="../CSS/tambah_produk.css">
</head>
<body>
    <div class="container bg p-4 rounded-4 mt-5">
        <form action="tambah_produk.php" method="post">
        <h2 class="text-center mb-4">Tambah Produk</h2>
            <div class="mb-3">
                <label for="name" class="form-label fw-semibold">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label fw-semibold">Kategori</label>
                <input type="text" class="form-control" id="category" name="category" placeholder="Kategori" required>
            </div>
            <div class="mb-3">
                <label for="specification" class="form-label fw-semibold">Spesifikasi</label>
                <input type="text" class="form-control" id="specification" name="specification" placeholder="Spesifikasi" required>
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label fw-semibold">Stok</label>
                <input type="text" class="form-control" id="stock" name="stock" placeholder="stock" required>
            </div>
            <div class="mb-3">
                <label for="supplier_id" class="form-label fw-semibold">supplier_id</label>
                <input type="text" class="form-control" id="supplier_id" name="supplier_id" placeholder="supplier_id" required>
            </div>
            <button type="submit" class="btn btn-secondary w-100">Tambah Barang</button>
        </form>
        <a href="dashboard.php">Kembali Ke Halaman Utama</a>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name = $_POST['name']; 
            $category = $_POST['category'];
            $specification = $_POST['specification'];
            $stock = $_POST['stock'];
            $supplier_id = $_POST['supplier_id'];

            $stmt = $conn->prepare("INSERT INTO products (name, category, specification, stock, supplier_id) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $name, $category, $specification, $stock, $supplier_id);
            if($stmt->execute()){
                echo "Produk baru berhasil ditambahkan";
            }else{
                echo "Error: ". $stmt->error;
            }
            $stmt->close();
        }
        ?>
    </div>
     <!-- Bootsrap 5 -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
