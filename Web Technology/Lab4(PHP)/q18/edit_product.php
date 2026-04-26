<!DOCTYPE html>
<html>
<head>
    <title>Edit Product Details</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 30px; background: #f4f4f4; }
        .edit-container { background: white; padding: 20px; width: 400px; margin: auto; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .input-group { margin-bottom: 15px; }
        label { display: block; font-weight: bold; margin-bottom: 5px; }
        input { width: 100%; padding: 8px; box-sizing: border-box; }
        .update-btn { background: #007bff; color: white; border: none; padding: 10px; width: 100%; cursor: pointer; border-radius: 4px; }
        .back-link { display: block; text-align: center; margin-top: 15px; color: #666; text-decoration: none; }
    </style>
</head>
<body>

<div class="edit-container">
    <h2>Modify Product</h2>

    <?php
    $conn = mysqli_connect("localhost", "root", "", "shop_db");

    if (isset($_GET['id'])) {
        $id = (int)$_GET['id'];
        $get_record = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
        $data = mysqli_fetch_assoc($get_record);
    }

    if (isset($_POST['update_now'])) {
        $id = (int)$_POST['product_id'];
        $name = mysqli_real_escape_string($conn, $_POST['p_name']);
        $cat = mysqli_real_escape_string($conn, $_POST['category']);
        $price = (float)$_POST['price'];

        $update_sql = "UPDATE products SET 
                       p_name = '$name', 
                       category = '$cat', 
                       price = $price 
                       WHERE id = $id";

        if (mysqli_query($conn, $update_sql)) {
            header("Location: manage_products.php");
            exit();
        } else {
            echo "Update Failed: " . mysqli_error($conn);
        }
    }
    ?>

    <form method="post" action="">
        <input type="hidden" name="product_id" value="<?php echo $data['id']; ?>">

        <div class="input-group">
            <label>Product Name</label>
            <input type="text" name="p_name" value="<?php echo htmlspecialchars($data['p_name']); ?>" required>
        </div>

        <div class="input-group">
            <label>Category</label>
            <input type="text" name="category" value="<?php echo htmlspecialchars($data['category']); ?>" required>
        </div>

        <div class="input-group">
            <label>Price</label>
            <input type="number" step="0.01" name="price" value="<?php echo $data['price']; ?>" required>
        </div>

        <button type="submit" name="update_now" class="update-btn">Save Changes</button>
        <a href="manage_products.php" class="back-link">Cancel and Go Back</a>
    </form>
</div>

</body>
</html>