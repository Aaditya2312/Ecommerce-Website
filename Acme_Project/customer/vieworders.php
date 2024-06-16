<?php
include "authguard.php";
include "../shared/connection.php";

$userid = $_SESSION['userid'];

$query = "SELECT * FROM `order_details` WHERE customerid = $userid";
$mysqli_result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Order Details</h2>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
        <tr>
            <th>Detail ID</th>
            <th>Order ID</th>
            <th>Customer ID</th>
            <th>Invoice No</th>
            <th>Quantity</th>
            <th>Product Info</th>
            <th>Amount</th>
            <th>Details</th>
            <th>Owner</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if ($mysqli_result) {
            while ($dbrow = mysqli_fetch_assoc($mysqli_result)) {
                $detailid = htmlspecialchars($dbrow['detailid']);
                $orderid = htmlspecialchars($dbrow['orderid']);
                $customerid = htmlspecialchars($dbrow['customerid']);
                $invoice_no = htmlspecialchars($dbrow['invoice_no']);
                $qty = htmlspecialchars($dbrow['qty']);
                $pdt_info = htmlspecialchars($dbrow['pdt_info']);
                $amount = htmlspecialchars($dbrow['amount']);
                $details = htmlspecialchars($dbrow['details']);
                $owner = htmlspecialchars($dbrow['owner']);

                echo "<tr>
                <td>$detailid</td>
                        <td>$orderid</td>
                        <td>$customerid</td>
                        <td>$invoice_no</td>
                        <td>$qty</td>
                        <td>$pdt_info</td>
                        <td>$amount</td>
                        <td>$details</td>
                        <td>$owner</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No order details found</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYk5ZY2S3uH/Jnk0dSAa2ua6rI6M1oW5Ll7jE6B7nuLMwNLD69Npy4HI+"
        crossorigin="anonymous"></script>
</body>
</html>
