<!DOCTYPE html>
<html>
<head>
    <title>Add New Book</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; background-color: #f0f0f0; }
        .form-container { background: white; padding: 20px; width: 450px; margin: auto; border: 1px solid #ccc; }
        .field { margin-bottom: 10px; }
        label { display: inline-block; width: 120px; font-weight: bold; }
        input { padding: 5px; width: 280px; }
        .btn { width: 100%; padding: 10px; background: #333; color: white; border: none; cursor: pointer; margin-top: 10px; }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Book Information Entry</h2>

    <?php
    if (isset($_POST['save_book'])) {
        $conn = mysqli_connect("localhost", "root", "", "library");

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $title = $_POST['title'];
        $publisher = $_POST['publisher'];
        $author = $_POST['author'];
        $edition = $_POST['edition'];
        $pages = (int)$_POST['no_of_page'];
        $price = (float)$_POST['price'];
        $p_date = date('Y-m-d', strtotime($_POST['publish_date']));
        $isbn = $_POST['isbn'];

        $sql = "INSERT INTO books (title, publisher, author, edition, no_of_page, price, publish_date, isbn) 
                VALUES ('$title', '$publisher', '$author', '$edition', $pages, $price, '$p_date', '$isbn')";

        if (mysqli_query($conn, $sql)) {
            echo "<h3 style='color:green;'>Success! Book added.</h3>";
        } else {
            die("SQL Error: " . mysqli_error($conn));
        }

        mysqli_close($conn);
    }
    ?>

    <form method="post" action="add_book.php">
        <div class="field">
            <label>Title:</label>
            <input type="text" name="title" required>
        </div>
        <div class="field">
            <label>Publisher:</label>
            <input type="text" name="publisher" required>
        </div>
        <div class="field">
            <label>Author:</label>
            <input type="text" name="author" required>
        </div>
        <div class="field">
            <label>Edition:</label>
            <input type="text" name="edition">
        </div>
        <div class="field">
            <label>No. of Pages:</label>
            <input type="number" name="no_of_page">
        </div>
        <div class="field">
            <label>Price:</label>
            <input type="text" name="price">
        </div>
        <div class="field">
            <label>Publish Date:</label>
            <input type="date" name="publish_date">
        </div>
        <div class="field">
            <label>ISBN:</label>
            <input type="text" name="isbn">
        </div>
        <button type="submit" name="save_book" class="btn">Save Book Data</button>
    </form>
</div>

</body>
</html>