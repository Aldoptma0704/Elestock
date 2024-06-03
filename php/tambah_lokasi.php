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
        <form action="tambah_lokasi.php" method="post">
        <h2 class="text-center mb-4">Tambah Produk</h2>
            <div class="mb-3">
                <label for="name" class="form-label fw-semibold">Nama Lokasi</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lokasi" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label fw-semibold">Deskripsi</label>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Deskripsi"></textarea>
            </div>
            <button type="submit" class="btn btn-secondary w-100">Tambah Barang</button>
        </form>
        <a href="location.php">Kembali Ke Halaman Utama</a>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name = $_POST['name']; 
            $description = $_POST['description'];

            $stmt = $conn->prepare("INSERT INTO locations (name, description) VALUES (?, ?)");
            $stmt->bind_param("ss", $name, $description);
            if($stmt->execute()){
                echo "Lokasi baru berhasil ditambahkan";
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
