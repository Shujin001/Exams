<?php
$conn = mysqli_connect("localhost", "root", "", "shop_db");

if (isset($_POST['add_product'])) {
    $name = mysqli_real_escape_string($conn, $_POST['p_name']);
    $cat = mysqli_real_escape_string($conn, $_POST['category']);
    $price = (float)$_POST['price'];
    
    mysqli_query($conn, "INSERT INTO products (p_name, category, price) VALUES ('$name', '$cat', $price)");
    header("Location: manage_products.php");
}

if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    mysqli_query($conn, "DELETE FROM products WHERE id=$id");
    header("Location: manage_products.php");
}

$result = mysqli_query($conn, "SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product CRUD System</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        .form-box { background: #eee; padding: 15px; margin-bottom: 20px; border-radius: 5px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background: #ddd; }
        .del-btn { color: red; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>

<div class="form-box">
    <h3>Add New Product</h3>
    <form method="post">
        <input type="text" name="p_name" placeholder="Product Name" required>
        <input type="text" name="category" placeholder="Category" required>
        <input type="number" step="0.01" name="price" placeholder="Price" required>
        <button type="submit" name="add_product">Save Product</button>
    </form>
</div>

<h3>Inventory List</h3>
<table>
    <tr>
        <th>ID</th>
        <th>Product Name</th>
        <th>Category</th>
        <th>Price</th>
        <th>Actions</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)): ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['p_name']; ?></td>
        <td><?php echo $row['category']; ?></td>
        <td>$<?php echo $row['price']; ?></td>
        <td>
            <a href="edit_product.php?id=<?php echo $row['id']; ?>">Edit</a> | 
            <a href="manage_products.php?delete=<?php echo $row['id']; ?>" class="del-btn" onclick="return confirm('Delete this product?')">Delete</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

</body>
</html>