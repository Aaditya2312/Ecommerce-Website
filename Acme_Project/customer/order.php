<?php
include "authguard.php";

$userid = $_SESSION['userid'];
$username = $_SESSION['username'];
// $t_amount = $_GET['t_amount'];

include "../shared/connection.php";
// $user_query = "SELECT * FROM user WHERE userid='$userid'";
// $user_result = mysqli_query($conn, $user_query);
// $user = mysqli_fetch_assoc($user_result);
// $address = $user['address']
$query = "select * from cart where userid=$userid";

$mysqli_status = mysqli_query($conn, $query);
$t_amount = 0;
while ($dbrow = mysqli_fetch_assoc($mysqli_status)) {
    $t_amount = $t_amount + $dbrow['total_cost'];
}
print_r($t_amount);

$invoice_no = mt_rand();

if($mysqli_status){
    $query = "insert into `order` (customerid,invoice_no,total_amount) values('$userid',$invoice_no, '$t_amount')";
    $mysqli_status = mysqli_query($conn,$query);
    print_r($mysqli_status);
    echo "Order Placed Successfully";
    echo "<script>window.location.href = 'orderdetails.php?invoice_no=$invoice_no';</script>";
}else{
    echo mysqli_error($conn);
}
?>