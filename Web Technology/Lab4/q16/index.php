<!DOCTYPE html>
<html>
<head>
    <title>User Registration with Photo</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; padding: 20px; }
        .reg-box { background: white; padding: 20px; width: 400px; margin: auto; border: 1px solid #ddd; }
        .field { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="file"] { width: 100%; padding: 8px; box-sizing: border-box; }
        .btn { background: #007bff; color: white; border: none; padding: 10px; width: 100%; cursor: pointer; }
    </style>
</head>
<body>

<div class="reg-box">
    <h2>Create Account</h2>

    <?php
    if (isset($_POST['register'])) {
        $conn = mysqli_connect("localhost", "root", "", "library");

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        
        $target_dir = "uploads/";
        if (!is_dir($target_dir)) { mkdir($target_dir); }

        $file_name = time() . "_" . basename($_FILES["photo"]["name"]);
        $target_file = $target_dir . $file_name;

        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {            $sql = "INSERT INTO users (username, photo_path) VALUES ('$username', '$target_file')";
            
            if (mysqli_query($conn, $sql)) {
                echo "<p style='color:green;'>Registration Successful!</p>";
                echo "<img src='$target_file' width='100' height='100' style='border-radius:50%;'><br>";
            }
        } else {
            echo "<p style='color:red;'>Error uploading photo.</p>";
        }
        mysqli_close($conn);
    }
    ?>

    <form method="post" enctype="multipart/form-data" action="">
        <div class="field">
            <label>Username:</label>
            <input type="text" name="username" required>
        </div>
        <div class="field">
            <label>Profile Photo:</label>
            <input type="file" name="photo" accept="image/*" required>
        </div>
        <button type="submit" name="register" class="btn">Register Now</button>
    </form>
</div>

</body>
</html>