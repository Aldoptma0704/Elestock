<?php include('Koneksi.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/dashboard.css">
    <title>Home</title>
</head>
<body>
    <?php
    include 'navbardashboard_user.php';
    ?>

    <main>
        <div class="container pt-5">

            <!-- Filter Kategori Barang-->
            <form method="GET" action="">
                <div class="mb-3">
                    <label for="category" class="form-label">Filter Kategori Barang</label>
                    <select id="category" name="category" class="form-select">
                        <option value="">Semua Kategori</option>
                        <?php
                        $categories_result = $conn->query("SELECT DISTINCT category FROM products");
                        if ($categories_result->num_rows > 0) {
                            while($category_row = $categories_result->fetch_assoc()) {
                                echo "<option value='".$category_row["category"]."'>".$category_row["category"]."</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Filter</button>
            </form>

            <table class="table mt-4">
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
                    $category_filter = isset($_GET['category']) ? $_GET['category'] : '';
                    $query = "SELECT * FROM products";
                    if ($category_filter) {
                        $query .= " WHERE category = '".$conn->real_escape_string($category_filter)."'";
                    }
                    $result = $conn->query($query);

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
                                    <a href='detail_produk.php?id=".$row["id"]."' class='btn btn-warning btn-sm'>Lihat Detail</a>
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
