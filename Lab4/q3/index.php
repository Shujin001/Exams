<!DOCTYPE html>
<html>
<head>
    <title>Nepalese Income Tax Calculator</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
        .container { background: white; border: 2px solid #000; padding: 20px; width: 800px; margin: auto; }
        .row { display: flex; gap: 10px; margin-bottom: 20px; align-items: center; }
        select, input { padding: 8px; border: 1px solid #ccc; border-radius: 4px; }
        .btn-clear { background: #17a2b8; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; }
        .btn-calc { background: #28a745; color: white; border: none; padding: 10px 20px; border-radius: 5px; float: right; cursor: pointer; }
        .result { margin-top: 20px; padding: 15px; background: #e9ecef; border-left: 5px solid #28a745; font-weight: bold; }
    </style>
</head>
<body>

<div class="container">
    <h2 style="margin-top: 0;">Nepalese Income Tax Calculator</h2>
    
    <?php
    $monthly = $annual = $tax = "";
    $gender = "Male";
    $status = "Un-married";

    if (isset($_POST['calculate'])) {
        $monthly = $_POST['monthly'];
        $gender = $_POST['gender'];
        $status = $_POST['status'];
        $annual = $monthly * 12;
        $temp_income = $annual;
        $total_tax = 0;

        if ($status == "Married") {
            $total_tax += min($temp_income, 450000) * 0.01;
            $temp_income -= 450000;

            if ($temp_income > 0) {
                $slab = min($temp_income, 100000);
                $total_tax += $slab * 0.10;
                $temp_income -= $slab;
            }
            if ($temp_income > 0) {
                $slab = min($temp_income, 200000);
                $total_tax += $slab * 0.20;
                $temp_income -= $slab;
            }
            if ($temp_income > 0) {
                $slab = min($temp_income, 550000);
                $total_tax += $slab * 0.30;
                $temp_income -= $slab;
            }
            if ($temp_income > 0) {
                $total_tax += $temp_income * 0.35;
            }
        } else { 
            $total_tax += min($temp_income, 400000) * 0.01;
            $temp_income -= 400000;

            if ($temp_income > 0) {
                $slab = min($temp_income, 100000);
                $total_tax += $slab * 0.10;
                $temp_income -= $slab;
            }
            if ($temp_income > 0) {
                $slab = min($temp_income, 250000);
                $total_tax += $slab * 0.20;
                $temp_income -= $slab;
            }
            if ($temp_income > 0) {
                $slab = min($temp_income, 550000);
                $total_tax += $slab * 0.30;
                $temp_income -= $slab;
            }
            if ($temp_income > 0) {
                $total_tax += $temp_income * 0.35;
            }
        }

        if ($gender == "Female") {
            $total_tax *= 0.90;
        }
        $tax = $total_tax;
    }
    ?>

    <form method="post">
        <div class="row">
            <span>Assessement Info</span>
            <select name="gender">
                <option value="Male" <?php if($gender=="Male") echo "selected"; ?>>Male</option>
                <option value="Female" <?php if($gender=="Female") echo "selected"; ?>>Female</option>
            </select>
            <select name="status">
                <option value="Un-married" <?php if($status=="Un-married") echo "selected"; ?>>Single Natural Person</option>
                <option value="Married" <?php if($status=="Married") echo "selected"; ?>>Couple Natural Person</option>
            </select>
        </div>

        <div class="row">
            <label>Monthly Salary</label>
            <input type="number" name="monthly" value="<?php echo $monthly; ?>" required>
        </div>

        <h3 style="margin: 10px 0;">Annual Income</h3>
        <div class="row">
            <label>Annual Gross Salary</label>
            <input type="text" value="<?php echo $annual; ?>" readonly>
        </div>

        <?php if($tax !== ""): ?>
            <div class="result">Total Annual Tax Payable: Rs. <?php echo number_format($tax, 2); ?></div>
        <?php endif; ?>

        <div style="overflow: auto; margin-top: 20px;">
            <button type="reset" class="btn-clear" onclick="window.location.href=window.location.href">Clear Inputs</button>
            <button type="submit" name="calculate" class="btn-calc">Calculate Tax</button>
        </div>
    </form>
</div>

</body>
</html>