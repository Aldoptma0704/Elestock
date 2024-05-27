<?php
include('Koneksi.php');

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['passwird'];

    $sql = "SELECT * FROM elestock WHERE username = ?";
    $stmt = $con->prepare("sql");
    $stmt->bin_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0){
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])){
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];


            switch ($role) {
                case 'manager_inventaris':
                    header("Location: manager_inventaris.php");
                    break;
                case 'manager_logistik':
                    header("Location: manager_logistik.php");
                    break;
                case 'manager_pengiriman':
                    header("Location: manager_pengiriman.php");
                    break;
                case 'manager_gudang':
                    header("Location: manager_gudang.php");
                    break;
                case 'manager_pembelian':
                    header("Location: manager_pembelian.php");
                    break;
                case 'analis_data':
                    header("Location: analis_data.php");
                    break;
                case 'pengguna_produksi':
                    header("Location: pengguna_produksi.php");
                    break;
                case 'pelanggan':
                    header("Location: pelanggan_dashboard.php");
                    break;
                case 'supplier':
                    header("Location: supplier_dashboard.php");
                    break;
                default:
                    echo "Invalid role!";
            }
        } else {
            echo "Invalid username or password!";
        }
    
        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Elestock</title>
    <link rel="stylesheet" href="../CSS/Login.css">
</head>
<body>
    <div class="container">
        <section class="login-section" id="loginsection">
            <h2>
                <span class="text-black">Welcome to</span>
                <span class="text-blue">Elestock</span>
            </h2>
            
            <form action="Login.html" method="post">
                <h3>Login User</h3>
                <h5>Sign in with your email/username and password</h5>
                <label for="username" class="form-label">Email/Username*</label>
                <input type="text" id="username" name="username" class="form-input" placeholder="Email/Usernma" required>
        
                <label for="password" class="form-label">password*</label>
                <input type="text" id="password" name="password" class="form-input" placeholder="password" required>
        
                <button type="submit">LOGIN</button>
            </form>
            <p>Not yet a member? <a href="Register.php">register Now</a></p>
            <button type="submit">SIGN UP</button>
        </section>
    </div>
</body>
</html>