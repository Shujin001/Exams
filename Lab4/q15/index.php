<?php
if (!isset($_COOKIE['user_pref'])) {
    setcookie("user_pref", "Dark_Mode", time() + 3600, "/");
    $status = "Cookie has been set!";
} else {
    $status = "Cookie is already active.";
}

if (isset($_GET['delete']) && $_GET['delete'] == '1') {
    setcookie("user_pref", "", time() - 3600, "/");
    header("Location: cookie_test.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cookie Management</title>
</head>
<body>

<h2>PHP Cookie Handler</h2>
<p><strong>Status:</strong> <?php echo $status; ?></p>

<hr>

<h3>Retrieve Data:</h3>
<?php
if (isset($_COOKIE['user_pref'])) {
    echo "The stored preference is: " . $_COOKIE['user_pref'];
    echo "<br><br><a href='?delete=1'>Click here to Destroy Cookie</a>";
} else {
    echo "No cookie found. Refresh the page to see the newly set cookie.";
}
?>

</body>
</html>