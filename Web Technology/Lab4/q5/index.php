<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 30px; }
        .form-box { width: 400px; margin: auto; padding: 20px; border: 1px solid #ccc; }
        .row { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input[type="text"], input[type="email"], input[type="password"], select { width: 100%; padding: 8px; }
    </style>
</head>
<body>

<div class="form-box">
    <h2>User Registration</h2>
    
    <?php
    if (isset($_POST['register'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];
        $faculty = $_POST['faculty'];

        if (!empty($name) && !empty($email) && !empty($pass) && !empty($phone)) {
            
            $conn = mysqli_connect("localhost", "root", "", "project");

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "INSERT INTO registrations (name, email, password, phone, gender, faculty) 
                    VALUES ('$name', '$email', '$pass', '$phone', '$gender', '$faculty')";

            if (mysqli_query($conn, $sql)) {
                echo "<p style='color:green;'>Data stored successfully!</p>";
            } else {
                echo "<p style='color:red;'>Error: " . mysqli_error($conn) . "</p>";
            }

            mysqli_close($conn);
        } else {
            echo "<p style='color:red;'>Please fill all required fields.</p>";
        }
    }
    ?>

    <form method="post" action="">
        <div class="row">
            <label>Name</label>
            <input type="text" name="name" required>
        </div>
        <div class="row">
            <label>Email</label>
            <input type="email" name="email" required>
        </div>
        <div class="row">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>
        <div class="row">
            <label>Phone</label>
            <input type="text" name="phone" required>
        </div>
        <div class="row">
            <label>Gender</label>
            <input type="radio" name="gender" value="Male" checked> Male
            <input type="radio" name="gender" value="Female"> Female
        </div>
        <div class="row">
            <label>Faculty</label>
            <select name="faculty">
                <option value="Science">Science</option>
                <option value="Management">Management</option>
                <option value="Humanities">Humanities</option>
            </select>
        </div>
        <button type="submit" name="register">Register</button>
    </form>
</div>

</body>
</html>