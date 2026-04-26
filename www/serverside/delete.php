<?php session_start();
include("./db.php");
if(!isset($_GET['id'])){
    $_SESSION['msg'] = "You are trying to unauthirized page"; 
}else{
    $id = $_GET['id'];
    $sql = "DELETE FROM users WHERE id=$id";
    $res = mysqli_query($conn, $sql);
    if($res) $_SESSION['msg'] = "User deleted successfully, ID = $id";
    else $_SESSION['msg'] = "User deletion failed";
}
header("location: ./list.php");