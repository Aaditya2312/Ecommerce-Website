<?php
include "authguard.php";
$cartid = $_GET['cartid'];
$pid = $_GET['pid'];

include "../shared/connection.php";
$query = "SELECT * FROM product WHERE pid = $pid";
$result = mysqli_query($conn, $query);
$dbrow = mysqli_fetch_assoc($result);

$query = "SELECT qty FROM cart WHERE cartid = $cartid";
$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $current_qty = $row['qty'];

    if ($current_qty > 1) {
        // If quantity is more than 1, decrement the quantity by 1
        $update_query = "UPDATE cart SET qty = qty - 1 WHERE cartid = $cartid";
        $update_status = mysqli_query($conn, $update_query);
        $update_query = "UPDATE cart SET total_cost = $dbrow[price] * qty where pid = $pid";
        $update_status = mysqli_query($conn, $update_query);

        if ($update_status) {
            echo "Quantity updated successfully";
            echo "<script>window.location.href = 'viewcart.php';</script>";
        } else {
            echo "Error updating quantity: " . mysqli_error($conn);
        }
    } else {
        // If quantity is 1, delete the item from the cart
        $delete_query = "DELETE FROM cart WHERE cartid = $cartid";
        $delete_status = mysqli_query($conn, $delete_query);

        if ($delete_status) {
            echo "Deleted successfully";
            echo "<script>window.location.href = 'viewcart.php';</script>";
        } else {
            echo "Error deleting item: " . mysqli_error($conn);
        }
    }
} else {
    echo "Error retrieving item: " . mysqli_error($conn);
}
?>