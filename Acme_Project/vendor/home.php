<?php
// session_start();
// if($_SESSION['login status']==false){
//     echo "Unauthorised Access";
//     exit;
// }
// if($_SESSION['login role']!='Vendor'){
//     echo "Illegal Attempt";
//     exit;
// }
include "authguard.php";
include "menu.html";
?>

<!-- <!DOCTYPE html>
<html lang="en">

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
<div class="d-flex justify-content-center align-items-center bg-light vh-100">
   <form action = "upload.php" method = "post" class="w-50 bg-secondary p-4" enctype = "multipart/form-data">
   
   <h3 class="text-center mb-3">Upload Product</h3>
    <input class="form-control mt-4" type="text" placeholder="Product Name" name="name"/>
    <input class="form-control mt-4" type="text" min = "0" placeholder="Product Price" name="price"/>
    <textarea class="form-control mt-4" placeholder = "Product Description" name="detail"></textarea>
    <input class="form-control mt-4" type = "file" name="pdtimg"/>
    
    <div class="text-center mt-4">
                <button class="btn btn-primary">Upload</button>
    </div>
   
</form>
</body>

</html> -->


<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid vh-100 d-flex">
        <div class="row flex-grow-1">
            <!-- Left Image Section -->
            <div class="col-md-6 d-none d-md-flex align-items-center justify-content-center bg-light p-0">
                <img src="https://www.helpbot.net/wp-content/uploads/2021/12/E_Commerce_Light_Gradient_08-scaled.jpg" class="img-fluid w-100 h-100" alt="Upload Product Image" style="object-fit: cover;">
            </div>
            
            <!-- Right Form Section -->
            <div class="col-md-6 d-flex align-items-center justify-content-center login-section p-4">
                <form action="upload.php" method="post" class="w-75" enctype="multipart/form-data">
                    <h3 class="text-center mb-3">Upload Product</h3>
                    <div class="mb-3">
                        <input required class="form-control" type="text" placeholder="Product Name" name="name">
                    </div>
                    <div class="mb-3">
                        <input required class="form-control" type="number" min="0" placeholder="Product Price" name="price">
                    </div>
                    <div class="mb-3">
                        <input required class="form-control" type="number" min="0" placeholder="Stock" name="stock">
                    </div>
                    <div class="mb-3">
                        <textarea required class="form-control" placeholder="Product Description" name="detail"></textarea>
                    </div>
                    <div class="mb-3">
                        <input required class="form-control" type="file" name="pdtimg">
                    </div>
                    <div class="text-center mt-4">
                        <button class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
