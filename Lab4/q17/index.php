<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .login-card { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); width: 350px; }
        .field { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        .btn { background: #28a745; color: white; border: none; padding: 12px; width: 100%; border-radius: 4px; cursor: pointer; font-size: 16px; }
        .error { color: red; margin-bottom: 15px; font-size: 14px; }
    </style>
</head>
<body>

<div class="login-card">
    <h2>Login</h2>

    <?php
    session_start();

    if (isset($_POST['login'])) {
        $conn = mysqli_connect("localhost", "root", "", "registrations");

        $user = mysqli_real_escape_string($conn, $_POST['username']);
        $pass = mysqli_real_escape_string($conn, $_POST['password']);

        $sql = "SELECT id, username FROM users WHERE username='$user' AND password='$pass'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];

            header("Location: ../q9/dashboard.php");
            exit();
        } else {
            echo "<p class='error'>Invalid username or password.</p>";
        }
        mysqli_close($conn);
    }
    ?>

    <form method="post" action="">
        <div class="field">
            <label>Username</label>
            <input type="text" name="username" required>
        </div>
        <div class="field">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>
        <button type="submit" name="login" class="btn">Sign In</button>
    </form>
</div>

</body>
</html>