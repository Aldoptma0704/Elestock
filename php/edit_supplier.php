<?php
include('Koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $contact_person = $_POST["contact_person"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    $sql = "UPDATE suppliers SET name=?, contact_person=?, email=?, phone=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $name, $contact_person, $email, $phone, $id);

    if ($stmt->execute()) {
        echo "Supplier updated successfully.";
        header("Location: supplier.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $id = $_GET["id"];
    $result = $conn->query("SELECT * FROM suppliers WHERE id = $id");
    $supplier = $result->fetch_assoc();
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
    <title>Edit Supplier</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg text-light bg-dark">
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
                        <a class="nav-link" href="supplier.php">Suppliers</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container pt-5">
        <h2 class="text-center">Edit Supplier</h2>
        <form method="POST" action="edit_supplier.php">
            <input type="hidden" name="id" value="<?php echo $supplier['id']; ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $supplier['name']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="contact_person" class="form-label">Contact Person</label>
                <input type="text" class="form-control" id="contact_person" name="contact_person" value="<?php echo $supplier['contact_person']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $supplier['email']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $supplier['phone']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
