<!DOCTYPE html>
<html>
<head>
    <title>View Stored Books</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #333; padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; }
        tr:nth-child(even) { background-color: #fafafa; }
        .no-data { text-align: center; padding: 20px; color: #888; }
    </style>
</head>
<body>

<h2>Registered Books Inventory</h2>

<?php
$conn = mysqli_connect("localhost", "root", "", "library");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id, title, publisher, author, edition, no_of_page, price, publish_date, isbn FROM books";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr>
            <th>ID</th>
            <th>Title</th>
            <th>Publisher</th>
            <th>Author</th>
            <th>Edition</th>
            <th>Pages</th>
            <th>Price</th>
            <th>Date</th>
            <th>ISBN</th>
          </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['title'] . "</td>";
        echo "<td>" . $row['publisher'] . "</td>";
        echo "<td>" . $row['author'] . "</td>";
        echo "<td>" . $row['edition'] . "</td>";
        echo "<td>" . $row['no_of_page'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>" . $row['publish_date'] . "</td>";
        echo "<td>" . $row['isbn'] . "</td>";
        echo "<td><a href='../q13/delete_book.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure?\")'>Delete</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p class='no-data'>No books found in the database.</p>";
}

mysqli_close($conn);
?>
<?php
if (isset($_GET['msg']) && $_GET['msg'] == 'deleted') {
    echo "<p style='color:red; font-weight:bold;'>Entry successfully removed from library.</p>";
}
?>
</body>
</html>