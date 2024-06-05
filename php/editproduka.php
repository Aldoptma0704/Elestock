<?php
include('Koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $category = $_POST["category"];
    $specification = $_POST["specification"];
    $stock = $_POST["stock"];
    $location_id = $_POST["location_id"];
    
    
    $sql = "UPDATE products SET name=?, category=?, specification=?, stock=?, location_id=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssiii", $name, $category, $specification, $stock, $location_id, $id);
    
    if ($stmt->execute()) {
        echo "Product updated successfully.";
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $id = $_GET["id"];
    $result = $conn->query("SELECT * FROM products WHERE id = $id");
    $product = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/dashboard.css">
    <title>Edit Product</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg text-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboard.php"><img src="../IMG/Logo.svg" alt="Logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="location.php">Location</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Supplier</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container pt-5">
        <h2 class="text-center">Edit Product</h2>
        <form method="POST" action="editproduka.php">
            <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $product['name']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <input type="text" class="form-control" id="category" name="category" value="<?php echo $product['category']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="specification" class="form-label">Specification</label>
                <input type="text" class="form-control" id="specification" name="specification" value="<?php echo $product['specification']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" class="form-control" id="stock" name="stock" value="<?php echo $product['stock']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="location_id" class="form-label">Location</label>
                <select class="form-control" id="location_id" name="location_id" required>
                    <?php
                    $location_result = $conn->query("SELECT id, name FROM locations");
                    while ($location = $location_result->fetch_assoc()) {
                        $selected = $location['id'] == $product['location_id'] ? 'selected' : '';
                        echo "<option value='".$location['id']."' $selected>".$location['name']."</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
