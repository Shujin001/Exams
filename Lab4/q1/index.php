<!DOCTYPE html>
<html>
<head>
    <title>PHP Calculator</title>
</head>
<body style="background-color: #f0f0f0; font-family: sans-serif; padding: 20px;">

    <?php
    $num1 = "";
    $num2 = "";
    $result = "";
    $operation_label = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];

        // Validation: Check if inputs are numeric
        if (is_numeric($num1) && is_numeric($num2)) {
            if (isset($_POST['add'])) {
                $result = $num1 + $num2;
                $operation_label = "Addition";
            } elseif (isset($_POST['subtract'])) {
                $result = $num1 - $num2;
                $operation_label = "Subtraction";
            } elseif (isset($_POST['divide'])) {
                if ($num2 != 0) {
                    $result = $num1 / $num2;
                    $operation_label = "Division";
                } else {
                    $result = "Error (Div by 0)";
                }
            } elseif (isset($_POST['multiply'])) {
                $result = $num1 * $num2;
                $operation_label = "Multiplication";
            }
        } else {
            $result = "Please enter valid numbers";
        }
    }
    ?>

    <form method="post" action="">
        <input type="number" name="num1" value="<?php echo $num1; ?>" required><br><br>
        <input type="number" name="num2" value="<?php echo $num2; ?>" required><br><br>

        <?php if ($result !== ""): ?>
            <p><?php echo $operation_label . ": " . $result; ?></p>
        <?php endif; ?>

        <div style="display: grid; grid-template-columns: 100px 100px; gap: 10px;">
            <button type="submit" name="add">Add</button>
            <button type="submit" name="subtract">Subtract</button>
            <button type="submit" name="divide">Divide</button>
            <button type="submit" name="multiply">Multiply</button>
        </div>
    </form>

</body>
</html>