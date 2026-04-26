<!DOCTYPE html>
<html>
<head>
    <title>Edit Book Data</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        .form-container { width: 400px; margin: auto; padding: 20px; border: 1px solid #ccc; }
        .field { margin-bottom: 10px; }
        label { display: block; font-weight: bold; }
        input { width: 100%; padding: 5px; box-sizing: border-box; }
        .btn { background: #28a745; color: white; padding: 10px; border: none; width: 100%; cursor: pointer; }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Update Book Details</h2>

    <?php
    $conn = mysqli_connect("localhost", "root", "", "library");
    $data = [];
    if (isset($_GET['id'])) {
        $id = (int)$_GET['id'];
        $res = mysqli_query($conn, "SELECT * FROM books WHERE id=$id");
        $data = mysqli_fetch_assoc($res);
    }

    if (isset($_POST['update_book'])) {
        $id = (int)$_POST['id'];
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $publisher = mysqli_real_escape_string($conn, $_POST['publisher']);
        $author = mysqli_real_escape_string($conn, $_POST['author']);
        $price = (float)$_POST['price'];

        $sql = "UPDATE books SET 
                title='$title', 
                publisher='$publisher', 
                author='$author', 
                price=$price 
                WHERE id=$id";

        if (mysqli_query($conn, $sql)) {
            echo "<p style='color:green;'>Record updated successfully!</p>";
            echo "<a href='view_books.php'>Back to Inventory</a>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
    ?>

    <form method="post" action="">
        <input type="hidden" name="id" value="<?php echo $data['id'] ?? ''; ?>">
        
        <div class="field">
            <label>Title</label>
            <input type="text" name="title" value="<?php echo htmlspecialchars($data['title'] ?? ''); ?>">
        </div>
        <div class="field">
            <label>Publisher</label>
            <input type="text" name="publisher" value="<?php echo htmlspecialchars($data['publisher'] ?? ''); ?>">
        </div>
        <div class="field">
            <label>Author</label>
            <input type="text" name="author" value="<?php echo htmlspecialchars($data['author'] ?? ''); ?>">
        </div>
        <div class="field">
            <label>Price</label>
            <input type="text" name="price" value="<?php echo $data['price'] ?? ''; ?>">
        </div>
                
        <button type="submit" name="update_book" class="btn">Update Record</button>
        
    </form>
</div>

</body>
</html>