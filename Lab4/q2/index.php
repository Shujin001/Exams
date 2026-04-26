<!DOCTYPE html>
<html>
<head>
    <title>Simple Interest Calculator</title>
    <style>
        body { background-color: #5500aa; display: flex; justify-content: center; padding: 50px; font-family: sans-serif; }
        .card { background: white; width: 350px; padding: 30px; border-radius: 30px; text-align: left; }
        h2 { text-align: center; color: #333; margin-bottom: 30px; }
        label { color: #aaa; font-size: 14px; display: block; margin-bottom: 5px; }
        input { width: 100%; padding: 12px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 10px; box-sizing: border-box; }
        .result-label { color: #aaa; font-size: 14px; margin: 5px 0; }
        .btn { width: 100%; background: #332d4a; color: white; border: none; padding: 15px; border-radius: 15px; font-size: 16px; cursor: pointer; margin-top: 20px; }
    </style>
</head>
<body>

<?php
$p = $r = $t = $interest = $total = "";

if (isset($_POST['calculate'])) {
    $p = $_POST['principal'];
    $r = $_POST['rate'];
    $t = $_POST['time'];

    if (is_numeric($p) && is_numeric($r) && is_numeric($t)) {
        $interest = ($p * $r * $t) / 100;
        $total = $p + $interest;
    }
}
?>

<div class="card">
    <h2>Simple Interest</h2>
    <form method="post" action="">
        <label>Principal</label>
        <input type="text" name="principal" value="<?php echo $p; ?>" required>

        <label>Rate Of Interest</label>
        <input type="text" name="rate" value="<?php echo $r; ?>" required>

        <label>Time</label>
        <input type="text" name="time" value="<?php echo $t; ?>" required>

        <div class="result-label">Interest: <b><?php echo $interest; ?></b></div>
        <div class="result-label">Total Plus Interest: <b><?php echo $total; ?></b></div>

        <button type="submit" name="calculate" class="btn">Calculate</button>
    </form>
</div>

</body>
</html>