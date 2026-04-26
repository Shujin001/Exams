<?php session_start();
include("./header.php"); 
include("./db.php");
if(!isset($_GET['id'])){
    $_SESSION['msg'] = "You are trying to unauthirized page"; 
    header("location:./list.php");
}

$id = $_GET["id"];
$sql = "SELECT * FROM users WHERE id=$id";
$res = mysqli_query($conn, $sql);
?>
    <main class="container" id="contanier">
        <h1 class="page-title">Register User</h1>
        <?php while($data = mysqli_fetch_assoc($res)):
                        //print_r($row); ?>
            <form action="./update.php" method="post" name="user_form" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $data['id'];?>">
                <div class="field-group">
                    <label for="fname">Full Name</label>
                    <input type="text" id="fname" name="fullname" value="<?php echo $data['fullname'];?>" placeholder="Ex:Ram Prasad">
                </div>
                <div class="field-group">
                    <label for="uname">Username</label>
                    <input type="text" id="uname" name="username" value="<?php echo $data['username'];?>" placeholder="Ex:myuser" disabled>
                </div>
                <div class="field-group">
                    <label for="email">E-Mail</label>
                    <input type="email" id="email" name="email" value="<?php echo $data['email'];?>" placeholder="Ex:email@domain.com" disabled>
                </div>
                <div class="field-group">
                    <label for="addr">Address</label>
                    <input type="text" id="addr" name="address" value="<?php echo $data['address'];?>">
                </div>
                <div class="field-group">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" name="phone" value="<?php echo $data['phone'];?>">
                </div>
                <div class="field-group">
                    <label for="photo">Photo</label>
                    <input type="file" id="photo" name="photo" value="">
                    <figure>
                        <img src="./public/<?php echo $data['photo'];?>" alt="photo" width="100" height="100">
                    </figure>
                </div>
                <input type="submit" name="submit" value="edit">
            </form>
        <?php endwhile; ?>
        <div class="btn-group">
            <span class="note">
               Already have an account? <a href="./login.php" class="text-link" title="Login User">Login User</a>
            </span><hr>
            <a href="./index.php" class="text-link" title="Go To Home">&larr;Go To Home</a>
        </div>
    </main>
<?php include("./footer.php"); ?>