<?php
session_start();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $conn = mysqli_connect("localhost", "root", "", "project");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM registrations WHERE email='$email' AND password='$pass'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        $_SESSION['user_name'] = $user['name'];
        
        header("Location: welcome.php");
        exit();
    } else {
        $error = "Invalid Email or Password!";
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 50px; }
        .login-box { width: 300px; margin: auto; padding: 20px; border: 1px solid #ccc; }
        .row { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input { width: 100%; padding: 8px; box-sizing: border-box; }
        .btn { width: 100%; padding: 10px; background: #007bff; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Login</h2>
    <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    
    <form method="post" action="">
        <div class="row">
            <label>Email</label>
            <input type="email" name="email" required>
        </div>
        <div class="row">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>
        <button type="submit" name="login" class="btn">Login</button>
    </form>
</div>

</body>
</html>