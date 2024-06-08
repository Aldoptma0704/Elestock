<?php
include('Koneksi.php');

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(!empty($username) && !empty($password)){
        $sql = "SELECT * FROM users WHERE username=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($password == $row['password']) {
                $_SESSION['login_user'] = $username;
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['is_admin'] = $row['is_admin'];

                if ($row['is_admin'] == 1) {
                    header("Location: dashboard.php"); //ke admin
                } else {
                    header("Location: HomePage.php"); //ke user
                }
                exit();
            } else {
                $error = "Invalid password.";
            }
        }else{
            $error = "No user found";
        }
    }else{
        $erorr = "Please enter both username and password.";
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
            
            <form action="Login.php" method="post">
                <h3>Login User</h3>
                <h5>Sign in with your email/username and password</h5>
                <label for="username" class="form-label">Email/Username*</label>
                <input type="text" id="username" name="username" class="form-input" placeholder="Email/Username" required>
        
                <label for="password" class="form-label">password*</label>
                <input type="password" id="password" name="password" class="form-input" placeholder="password" required>
        
                <button type="submit">LOGIN</button>
            </form>
            <p>Not yet a member? <a href="Register.php">register Now</a></p>
            <button type="submit">SIGN UP</button>
        </section>
    </div>
</body>
</html>