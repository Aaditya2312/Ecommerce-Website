<?php
include "authguard.php";
$id = $_SESSION['userid'];
$productid = $_GET['pid'];

include "../shared/connection.php";
$sql_result = mysqli_query($conn, "select * from product where pid='$productid'");

while ($dbrow = mysqli_fetch_assoc($sql_result)) {
    $name = $dbrow['name'];
    $price = $dbrow['price'];
    $detail = $dbrow['detail'];
    $imgpath = $dbrow['impath'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>E_Commerce_Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="d-flex justify-content-center align-items-center vh-100">
        <form action="update.php?pid=<?php echo $productid; ?>" method="post" class="w-50" enctype="multipart/form-data">
            <h4 class="text-center mt-3">Update Product</h4>
            <div class="mt-2">
                <label for="currentImage">Current Image:</label>
                <img id="currentImage" src="<?php echo htmlspecialchars($imgpath); ?>" alt="Product Image" class="img-thumbnail" style="max-width: 100px;">
            </div>
            <div class="text-center mt-3">
                <input class="form-control mt-2" required type="text" placeholder="Product name" name="name" value="<?php echo htmlspecialchars($name); ?>">
                <input class="form-control mt-2" required type="number" min="0" placeholder="Product price" name="price" value="<?php echo htmlspecialchars($price); ?>">
                <textarea class="form-control mt-2" placeholder="Product detail" name="detail"><?php echo htmlspecialchars($detail); ?></textarea>
                <input class="form-control mt-2" type="file" name="pdtimg">

                <button class="btn btn-success mt-3">Update</button>
            </div>
        </form>
    </div>

</body>

</html>