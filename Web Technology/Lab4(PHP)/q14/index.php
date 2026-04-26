<?php
session_start();

echo "<h2>Session Management System</h2>";

if (!isset($_SESSION['view_count'])) {
    $_SESSION['view_count'] = 1;
    $_SESSION['user_role'] = "Administrator";
    echo "<b>Status:</b> Session initialized. Welcome!<br>";
} else {
    $_SESSION['view_count']++;
    echo "<b>Status:</b> Session active.<br>";
}

echo "<b>Session ID:</b> " . session_id() . "<br>";
echo "<b>User Role:</b> " . $_SESSION['user_role'] . "<br>";
echo "<b>Page Views in this session:</b> " . $_SESSION['view_count'] . "<br><hr>";

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
} else {
    echo '<a href="?action=logout">Click here to Destroy Session (Logout)</a>';
}
?>