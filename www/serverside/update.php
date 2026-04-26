<?php session_start();
include("./db.php");
if(!isset($_POST['id'])){
    $_SESSION['msg'] = "You are trying to unauthirized page"; 
}else{
    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $photo = $_FILES['photo'];
    //print_r($photo);
    $sql="";
    if($photo['name'] != ''){
        $pname = $photo['name'];
        move_uploaded_file($photo['tmp_name'], "./public/" . $photo['name']);
        $sql = "UPDATE users 
                SET fullname='$fullname', address='$address', phone='$phone', photo='$pname' 
                WHERE id=$id";
    }else{
    $sql = "UPDATE users 
            SET fullname='$fullname', address='$address', phone='$phone' 
            WHERE id=$id";
    }

    $res = mysqli_query($conn, $sql);
    if($res) $_SESSION['msg'] = "User deleted successfully, ID = $id";
    else $_SESSION['msg'] = "User deletion failed";
}
$id = $_POST['id'];
header("location: ./edit.php?id=$id");