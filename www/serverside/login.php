<?php session_start();
include("./header.php");
include("./db.php");
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id, username, password FROM users WHERE username='$username'";
    $res = mysqli_query($conn, $sql);
    if($res){
        $hashPwd = sha1($password);
        while($data = mysqli_fetch_assoc($res)){
            echo "test";
            if($hashPwd == $data['password']){
                $_SESSION['user_log'] = true;
                $_SESSION['user_id'] = $data['id'];
                header("location: ./list.php");
            }else{
                $_SESSION['msg'] = "Password not matched!";
            }
        }
    }else{
        $_SESSION['msg'] = "Username and Password not matched.";
    }
}
?>
    <main class="container" id="contanier">
        <h1 class="page-title">Login User</h1>
        <?php echo isset($_SESSION['msg']) 
                ? "<span class='msg'>" . $_SESSION['msg'] . "</span>"
                : ""; ?>
        <form action="#" method="post" name="user_form">
            <div class="field-group">
                <label for="uname">Username / E-Mail</label>
                <input type="text" id="uname" name="username" value="" placeholder="Ex:email@domain.com">
            </div>
            <div class="field-group">
                <label for="pwd">Password</label>
                <input type="password" id="pwd" name="password" value="" placeholder="Your Password">
            </div>
            <div class="field-group">
                <input type="checkbox" id="rem" name="rem" value="1">
                <label for="rem">Remember login Credidentals.</label>
            </div>
            <input type="submit" name="submit" value="Login" class="btn">
        </form>
        
        <div class="btn-group">
            <span class="note">
                Don't you have account? <a href="./register.php" class="text-link" title="Register">Register User</a>
            </span><hr>
            <a href="./index.php" class="text-link" title="Go To Home">&larr;Go To Home</a>
        </div>
    </main>
<?php include("./footer.php");
unset($_SESSION['msg']); ?>