<?php include('Koneksi.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/location.css">
    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">
    <title>Daftar Lokasi</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg text-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboard.php"><img src="../IMG/Logo.svg" alt="Logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="location.php">Location</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Supplier</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="sidebar">
        <a href="dashboard.php"><i class="lni lni-clipboard"></i></a><br>
        <a href="dashboard.php"><i class="lni lni-graph"></i></a><br>
        <a href="dashboard.php"><i class="lni lni-stats-up"></i></a><br>
        <a href="dashboard.php"><i class="lni lni-dropbox"></i></a><br>
        <a href="dashboard.php"><i class="lni lni-database"></i></a><br>
    </div>
    <main>
        <div class="container pt-5">
            <h2 class="text-center">Daftar Lokasi</h2>
            <a href="tambah_lokasi.php" class="btn btn-success mb-3">Tambah Lokasi</a>
            <table class="table">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = $conn->query("SELECT * FROM locations");
                    while($row = $result->fetch_assoc()){
                        echo "<tr>
                            <td>".$row["id"]."</td>
                            <td>".$row["name"]."</td>
                            <td>".$row["description"]."</td>
                            <td>
                                <a href='edit_location.php?id=".$row["id"]."'>Edit</a>
                                <a href='delete_location.php?id=".$row["id"]."'>Delete</a>
                            </td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
