<?php
include('db.php');
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $sql = "INSERT INTO registrations (name, email, password) VALUES ('$name', '$email', '$pass')";
    if (mysqli_query($conn, $sql)) {
        header("Location: login.php");
    }
}
?>
<form method="post">
    <input type="text" name="name" placeholder="Name" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit" name="register">Register</button>
</form>