<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .pdt-img {
            width: 100%;
            height: 200px;
            object-fit: contain;
        }
        .price::after {
            content: " Rs";
        }
    </style>
</head>

<body>
    <?php
    include "authguard.php";
    include "menu.html";
    include "../shared/connection.php";

    echo "<div class='container mt-4'>";
    echo "<div class='row'>";

    $sql_result = mysqli_query($conn,"select * from cart join product on cart.pid = 
    product.pid where userid = $_SESSION[userid]");

    while ($dbrow = mysqli_fetch_assoc($sql_result)) {

        echo "<div class='col-md-4 mb-4'>";
        echo "<div class='card'>";
        echo "<img class='card-img-top pdt-img' src='{$dbrow['impath']}' alt='{$dbrow['name']}'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>" . $dbrow['name'] . "</h5>";
        echo "<p class='card-text price'>" . $dbrow['price'] . "</p>";
        echo "<p class='card-text'>" . $dbrow['detail'] . "</p>";
        echo "<p class='card-text'>Quantity: " . $dbrow['qty'] . "</p>";
        echo "<p class='card-text'>Total Cost: " . $dbrow['total_cost'] . " Rs</p>";
        echo "<div class='d-flex justify-content-between'>";
        echo "<a href='deletecart.php?cartid={$dbrow['cartid']}&pid={$dbrow['pid']}' class='btn btn-warning'>Remove</a>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }

    // echo "</div>"; // Close row
    // echo "<div class='row mt-4'>";
    // echo "<div class='col-12 text-center'>";
    // // echo "<h4>Total Amount: " . $totalAmount . " Rs</h4>";
    // echo "<a href='order.php' class='btn btn-success'>Place Order</a>";
    // echo "</div>";
    // echo "</div>"; // Close row
    // echo "</div>"; // Close container
    ?>
    
<?php
// Assuming you already have the $dbrow variable which is a mysqli_result
// Fetch the row as an associative array
$id = $_SESSION['userid'];
$sql_result = mysqli_query($conn, "select * from user where userid='$id'");
$row = $sql_result->fetch_assoc();

// Check if the address field is present and not empty
$address = isset($row['address']) ? $row['address'] : '';

echo "</div>"; // Close row
echo "<div class='row mt-2'>";
echo "<div class='col-12 text-center'>";

// Check if the address is empty
if (!empty($address)) {
    // Address is not empty, show the "Place Order" button
    echo "<a href='order.php' class='btn btn-success mb-4'>Place Order</a>";
} else {
    // Address is empty, you can show a message if you want
    echo "<p>Please provide an address to place an order.</p>";
}

echo "</div>";
echo "</div>"; // Close row
echo "</div>"; // Close container
?>
</body>

</html>
