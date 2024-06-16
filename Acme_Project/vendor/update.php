<?php

include "authguard.php";
$id = $_SESSION['userid'];
$productid = $_GET['pid'];
// echo "$productid";

$img_name = $_FILES['pdtimg']['name'];
$img_path = $_FILES['pdtimg']['tmp_name'];

$target = "../shared/images/$img_name";

move_uploaded_file($img_path, $target);

include "../shared/connection.php";

// $sql_status = mysqli_query($conn, "update products set name=$_POST[name],price=$_POST[price],detail=$_POST[detail],imgpath=$target,owner=$id");
$sql_status = mysqli_query($conn, "UPDATE product SET 
    name='$_POST[name]', 
    price='$_POST[price]', 
    stock='$_POST[stock]', 
    detail='$_POST[detail]', 
    impath='$target', 
    owner='$id' 
    WHERE pid='$productid'");

if ($sql_status) {
    echo "Product Updated Successfully";
    header("location:view.php");
} else {
    echo mysqli_error($conn);
}