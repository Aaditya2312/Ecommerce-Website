<?php
include "authguard.php";
$userid = $_SESSION['userid'];
$pid = $_GET['pid'];

include "../shared/connection.php";
$query = "delete from product where pid = $pid";

$mysqli_status = mysqli_query($conn,$query);

if($mysqli_status){
    echo "Deleted Successfully";
    header('location:view.php');
}else{
    echo mysqli_error($conn);
}
?>