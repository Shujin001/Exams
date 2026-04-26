<?php
session_start();

echo "<h2>Session Management System</h2>";

$_SESSION['username'] = "JohnDoe";
$_SESSION['role'] = "Admin";
$_SESSION['start_time'] = date('Y-m-d H:i:s');

echo "<b>Status:</b> Session variables have been set.<br>";
echo "<b>Session ID:</b> " . session_id() . "<br><hr>";

if (isset($_SESSION['username'])) {
    echo "<h3>Retrieved Data:</h3>";
    echo "Username: " . $_SESSION['username'] . "<br>";
    echo "User Role: " . $_SESSION['role'] . "<br>";
    echo "Session Started: " . $_SESSION['start_time'] . "<br><hr>";
}

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    session_unset();
    session_destroy();
    echo "<b>Status:</b> Session has been destroyed. Refresh to see changes.";
} else {
    echo '<a href="?action=logout">Click here to Destroy Session (Logout)</a>';
}
?>