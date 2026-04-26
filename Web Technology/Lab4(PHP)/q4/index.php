<!DOCTYPE html>
<html>
<head>
    <title>Student Registration Form</title>
    <style>
        body { background-color: #00ffff; font-family: 'Times New Roman', serif; padding: 20px; }
        .form-container { width: 600px; margin: auto; border: 1px solid #333; padding: 20px; }
        .header-box { border: 2px solid #333; padding: 10px; text-align: center; margin-bottom: 20px; }
        .row { margin-bottom: 12px; display: flex; align-items: center; }
        label { width: 150px; display: inline-block; font-weight: bold; }
        input[type="text"], input[type="email"], select { width: 300px; padding: 3px; }
        .date-input { width: 60px !important; margin-right: 5px; }
        .btn-row { margin-top: 20px; border-top: 1px solid #333; padding-top: 10px; }
    </style>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];
    
    if (empty($_POST['full_name'])) $errors[] = "Name is required.";
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) $errors[] = "Invalid email format.";
    if (empty($_POST['gender'])) $errors[] = "Gender is required.";

    if (empty($errors)) {
        echo "<script>alert('Form Submitted Successfully!');</script>";
    } else {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }
}
?>

<div class="form-container">
    <div class="header-box">
        <h1 style="margin:0;">Student Registration Form</h1>
    </div>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <label>Name :</label>
            <input type="text" name="full_name" placeholder="Enter full name">
        </div>

        <div class="row">
            <label>Father's Name :</label>
            <input type="text" name="father_name">
        </div>

        <div class="row">
            <label>Mother's Name :</label>
            <input type="text" name="mother_name">
        </div>

        <div class="row">
            <label>Phone Number :</label>
            <input type="text" name="phone" placeholder="017xxxxxxxxx">
        </div>

        <div class="row">
            <label>Email :</label>
            <input type="email" name="email" placeholder="sample@example.com">
        </div>

        <div class="row">
            <label>Gender :</label>
            <input type="radio" name="gender" value="Male"> Male
            <input type="radio" name="gender" value="Female"> Female
            <input type="radio" name="gender" value="Other"> Other
        </div>

        <div class="row">
            <label>Date Of Birth :</label>
            <input type="text" class="date-input"> - 
            <input type="text" class="date-input"> - 
            <input type="text" class="date-input" style="width:80px !important;"> (dd-mm-yyyy)
        </div>

        <div class="row">
            <label>Address :</label>
            <input type="text" name="address" placeholder="Street:- House:- Road:-" style="width:400px;">
        </div>

        <div class="row">
            <label>Blood Group :</label>
            <select name="blood_group">
                <option>Select</option>
                <option>A+</option>
                <option>O+</option>
                <option>B+</option>
            </select>
        </div>

        <div class="row">
            <label>Department :</label>
            <input type="radio" name="dept" value="CSE"> CSE
            <input type="radio" name="dept" value="EEE"> EEE
            <input type="radio" name="dept" value="BBA"> BBA
        </div>

        <div class="row">
            <label>Course :</label>
            <input type="checkbox" name="course[]" value="C"> C
            <input type="checkbox" name="course[]" value="C++"> C++
            <input type="checkbox" name="course[]" value="Java"> Java
            <input type="checkbox" name="course[]" value="AI"> AI
            <input type="checkbox" name="course[]" value="ML"> Machine learning
            <input type="checkbox" name="course[]" value="Robotics"> Robotics
        </div>

        <div class="row">
            <label>Photo :</label>
            <input type="file" name="student_photo">
        </div>

        <div class="btn-row">
            <input type="submit" value="Submit">
            <input type="reset" value="Reset">
        </div>
    </form>
</div>
</body>
</html>