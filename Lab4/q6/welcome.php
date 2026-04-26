<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<body>
    <h1>Welcome, <?php echo $_SESSION['user_name']; ?>!</h1>
    <p>You have successfully logged in.</p>
    <a href="logout.php">Logout</a>
</body>
</html>