<?php
include('db.php');
session_start();
if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $pass = trim($_POST['password']);

    $sql = "SELECT * FROM registrations WHERE email='$email' AND password='$pass'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user'] = $user['name'];
        setcookie("last_login", date("Y-m-d H:i:s"), time() + 3600, "/");
        header("Location: dashboard.php");
    } else {
        echo "Invalid Credentials";
    }
}
?>
<form method="post">
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit" name="login">Login</button>
</form>