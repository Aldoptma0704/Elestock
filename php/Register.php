<?php
include('Koneksi.php');
include 'auth.php';
if (isset($_SESSION['login_user'])){
    header("Location: HomePage.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $confirmPassword = isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : '';

    if (empty($email)) {
        echo 'Email is required.';
        header("Refresh: 2; url=Register.php");
    }

    if ($password !== $confirmPassword){
    } else {

        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $username, $email, $password);

        if ($stmt->execute()) {
            header("Location: Login.php");
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
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
        <form action="Register.php" method="post">
            <label for="username" class="form-label">Username*</label>
            <input type="text" id="username" name="username" class="form-input" placeholder="username" required>
            <label for="email" class="form-label">Email*</label>
            <input type="email" id="email" name="email" class="form-input" placeholder="email">
            <label for="password" class="form-label">Password*</label>
            <input type="password" id="password" name="password" class="form-input" placeholder="password" required>
            <label for="confirmPassword" class="form-label">Confirm Password*</label>
            <input type="password" id="confirmPassword" name="confirmPassword" class="form-input" placeholder="Confirm Password" required>

            <button type="submit">Register</button>
        </form>
    </section>
</body>
</html>
