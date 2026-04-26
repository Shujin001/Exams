<?php
$conn = mysqli_connect("localhost", "root", "", "library");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    $sql = "DELETE FROM books WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../q11/view_books.php?msg=deleted");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>