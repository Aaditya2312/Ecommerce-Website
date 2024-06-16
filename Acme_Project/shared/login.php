<?php

session_start();
$_SESSION['login status'] = false;

$uname = $_POST['username'];
$upass = $_POST['password'];

$cipher=md5($upass);

// $conn = new mysqli("localhost", "root", "", "acme24_march", 3306);
include "connection.php";

$sql_result = mysqli_query($conn, "select * from user where username = '$uname' and password = '$cipher'");

print_r($sql_result);

if(mysqli_num_rows($sql_result)>0){
    echo "Login Success";
    $dbrow = mysqli_fetch_assoc($sql_result);
    
    $_SESSION['login status'] = true;
    $_SESSION['login role'] = $dbrow['role'];
    $_SESSION['userid'] = $dbrow['userid'];
    $_SESSION['username'] = $dbrow['username'];
    
    echo "<br>";
    print_r($dbrow);

    if($dbrow['role']=='Vendor'){
        header("location:../vendor/home.php");
    }else if($dbrow['role']=='Customer'){
        header("location:../customer/home.php");
    }
}else{
    echo "Invalid Credentials";
}

?>