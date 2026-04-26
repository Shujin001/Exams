<?php  session_start();
include("./header.php"); 
include "./db.php"; //it gives $conn variable

    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    
    if(isset($_POST['submit'])){
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $agree = $_POST['agree'];

        if($password == $cpassword){
            $hashPwd = sha1($password);
            $sql = "INSERT INTO users(fullname, username, email, password)
                    VALUES('$fullname', '$username', '$email', '$hashPwd');";
            $res = mysqli_query($conn, $sql);
            if($res) {
                $_SESSION['msg'] = "Hey! User registered successfully.";
                header("location: ./login.php");//redirection
            } else $_SESSION['msg'] = "Oops! User registered failed successfully.";
        }else{
            $_SESSION['msg'] = "Oops! Password not matched.";
        }
    }
?>

    <main class="container" id="contanier">
        <h1 class="page-title">Register User</h1>
        <form action="#" method="post" name="user_form">
            <div class="field-group">
                <label for="fname">Full Name</label>
                <input type="text" id="fname" name="fullname" value="" placeholder="Ex:Ram Prasad">
            </div>
            <div class="field-group">
                <label for="uname">Username</label>
                <input type="text" id="uname" name="username" value="" placeholder="Ex:myuser">
            </div>
            <div class="field-group">
                <label for="email">E-Mail</label>
                <input type="email" id="email" name="email" value="" placeholder="Ex:email@domain.com">
            </div>
            <div class="field-group">
                <label for="pwd">Password</label>
                <input type="password" id="pwd" name="password" value="" placeholder="Your Password">
            </div>
            <div class="field-group">
                <label for="cpwd">Confirm Password</label>
                <input type="password" id="cpwd" name="cpassword" value="" placeholder="Confirm Your Password">
            </div>
            <div class="field-group">
                <input type="checkbox" id="agree" name="agree" value="1">
                <label for="agree">I agree with the <a href="#" title="Terms and Conditions">Terms and Conditions</a></label>
            </div>
            <input type="submit" name="submit" value="Register" class="btn">
            <input type="reset" name="reset" value="Reset" class="btn">
        </form>
        
        <div class="btn-group">
            <span class="note">
               Already have an account? <a href="./login.php" class="text-link" title="Login User">Login User</a>
            </span><hr>
            <a href="./index.php" class="text-link" title="Go To Home">&larr;Go To Home</a>
        </div>
    </main>
<?php include("./footer.php"); ?>