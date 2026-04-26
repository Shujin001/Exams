<?php session_start();

if(!isset($_SESSION['user_log']) || $_SESSION['user_log'] == false){
    $_SESSION['msg'] = "Login to access list of users."; 
    header("location: ./login.php");
}
include("./header.php"); 
include("./db.php");
$sql = "SELECT id, fullname, username, email FROM users";
$res = mysqli_query($conn, $sql);
// To check data - var_dump($res); print_r($res);
?>
    <main class="container" id="container">
        <h1 class="page-title">All User</h1>
        <a href="./logout.php">Logout</a>
        <?php echo isset($_SESSION['msg']) 
                ? "<span class='msg'>" . $_SESSION['msg'] . "</span>"
                : ""; ?>
        <table border="1" cellpadding="9" cellspacing="0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>E-Mail</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; while($row = mysqli_fetch_assoc($res)):
                        //print_r($row); ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['fullname']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                        <a href="./edit.php?id=<?php echo $row['id']; ?>" class="icon" title="Edit">Edit</a>
                        <a href="./delete.php?id=<?php echo $row['id']; ?>" class="icon" title="Delete">Delete</a>
                    </td>
                </tr>
                <?php $i++; endwhile; ?>
            </tbody>
        </table>
        <div class="btn-group">
            <a href="./register.php" class="btn" title="Register Now">Register Now</a>
            <a href="./list.php" class="text-link" title="View All Users">View All Users</a>
        </div>
    </main>
<?php include("./footer.php"); 
unset($_SESSION['msg']); ?>