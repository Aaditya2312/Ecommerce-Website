<?php

$cipher = md5($_POST['password1']);
// $conn=new mysqli("localhost", "root", "", "acme24_march", 3306);
include "connection.php";

$query="insert into user(username, password, role) values('$_POST[username]', '$cipher', '$_POST[role]')";
header("location:login.html");
echo $query;
mysqli_query($conn,$query);

?>