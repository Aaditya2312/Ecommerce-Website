<?php
include "authguard.php";

$userid = $_SESSION['userid'];
$pid = $_GET['pid'];

include "../shared/connection.php";

/*
Check if the pid and userid combo already exists.
If it already exists, add the qty+1 and update the row instead
*/
$query = "SELECT * FROM product WHERE pid = $pid";
$result = mysqli_query($conn, $query);
$dbrow = mysqli_fetch_assoc($result);

$query = "SELECT * FROM cart WHERE userid = $userid AND pid = $pid";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    // The combination exists, update the quantity
    //if($dbrow['qty']  <= $dbrow[stock])
    $sql_result = mysqli_query($conn,"SELECT * FROM product JOIN cart ON product.pid = cart.pid WHERE product.pid = '$pid'");
    $dbrow2 = mysqli_fetch_assoc($sql_result);
    
    if($dbrow2['qty'] < $dbrow2['stock']){
    $update_query = "UPDATE cart SET qty = qty + 1 WHERE userid = $userid AND pid = $pid";
    $update_status = mysqli_query($conn, $update_query);
    
    $update_query = "UPDATE cart SET total_cost = $dbrow[price] * qty  WHERE userid = $userid AND pid = $pid";
    $update_status = mysqli_query($conn, $update_query);

    if ($update_status) {
        echo "Updated quantity in Cart Successfully";
        echo "<script>window.location.href = 'viewcart.php';</script>";
    } else {
        echo "Error updating cart: " . mysqli_error($conn);
    }
}else{
    echo "<script>window.location.href = 'viewcart.php';</script>";
}
} else {
    // The combination does not exist, insert a new row
$insert_query = "INSERT INTO cart (userid, pid) VALUES ($userid, $pid)";
$insert_status = mysqli_query($conn, $insert_query);
$update_query = "UPDATE cart SET total_cost = $dbrow[price] * qty  WHERE userid = $userid AND pid = $pid";
$update_status = mysqli_query($conn, $update_query);

    if ($insert_status) {
        echo "Added to Cart Successfully";
        echo "<script>window.location.href = 'viewcart.php';</script>";
    } else {
        echo "Error adding to cart: " . mysqli_error($conn);
    }
}
?>