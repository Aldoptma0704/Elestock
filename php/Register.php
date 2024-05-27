<?php
include('Koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role = $_POST['role'];

    $sql = "INSERT INTO users (username, password, role) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $password, $role);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="../CSS/register.css">
</head>
<body>
    <section class="register-section">
        <h1>Activate Your Account</h1>
        <form action="register.php" method="post">
            <label for="username" class="form-label">Username*</label>
            <input type="text" id="username" name="username" class="form-input" placeholder="username" required>
            <label for="password" class="form-label">Password*</label>
            <input type="password" id="password" name="password" class="form-input" placeholder="password" required>
            <label for="role" class="form-label">Role*</label>
            <select id="role" name="role" class="form-input" required>
                <option value="pelanggan">Pelanggan</option>
                <option value="supplier">Supplier</option>
                <option value="manager_inventaris">Manajer Inventaris</option>
                <option value="manager_logistik">Manajer Logistik</option>
                <option value="manager_pengiriman">Manajer Pengiriman</option>
                <option value="manager_gudang">Manajer Gudang</option>
                <option value="manager_pembelian">Manajer Pembelian</option>
                <option value="analis_data">Analisis Data</option>
                <option value="pengguna_produksi">Pengguna Produksi</option>
            </select>
            <a href="Login.ph"><button type="submit">Register</button></a>
        </form>
    </section>
</body>
</html>