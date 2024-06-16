<?php

session_start();
$userid = $_SESSION['userid'];

print_r($_POST);
echo "<br>";
print_r($_FILES);

$img_name = $_FILES['pdtimg']['name'];
$img_path = $_FILES['pdtimg']['tmp_name'];

$target = "../shared/images/$img_name";
echo "<br> $target";

move_uploaded_file($img_path,$target);

$conn = new mysqli("localhost", "root", "", "acme24_march", 3306);
// include "../shared/connection.php";


$sql_status = mysqli_query($conn,"insert into product(name,price,stock,detail,impath,owner) values('$_POST[name]', 
$_POST[price],$_POST[stock], '$_POST[detail]', '$target', $userid)");

if($sql_status){
    echo "Product Uploaded Successfully";
    header("location:view.php");
}else{
    echo mysqli_error($error);
}
?>