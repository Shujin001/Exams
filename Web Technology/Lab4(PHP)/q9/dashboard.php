<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>
<h1>Welcome to Dashboard, <?php echo $_SESSION['user']; ?></h1>
<p>Last login cookie set at: <?php echo $_COOKIE['last_login'] ?? 'Not set'; ?></p>
<a href="logout.php">Logout</a>