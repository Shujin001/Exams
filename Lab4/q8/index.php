<?php
$cookie_name = "user_preference";
$cookie_value = "Dark Mode";

setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

echo "<h2>Cookie Management System</h2>";

if (isset($_COOKIE[$cookie_name])) {
    echo "<b>Status:</b> Cookie is set.<br>";
    echo "<b>Cookie Name:</b> " . $cookie_name . "<br>";
    echo "<b>Stored Value:</b> " . $_COOKIE[$cookie_name] . "<br><hr>";
} else {
    echo "<b>Status:</b> Cookie is not found. (Note: Cookies require a page refresh to appear).<br><hr>";
}

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    setcookie($cookie_name, "", time() - 3600, "/");
    header("Location: cookie_test.php");
    exit();
} else {
    echo '<a href="?action=delete">Click here to Delete Cookie</a>';
}
?>