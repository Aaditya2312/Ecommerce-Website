<?php
session_start();
if($_SESSION['login status']==false){
    echo "Unauthorised Access";
    exit;
}
if($_SESSION['login role']!='Vendor'){
    echo "Illegal Attempt";
    exit;
}

// echo "<div class='d-flex justify-content-around bg-primary text-white'> 
//     <div>" . $_SESSION['userid'] . "</div>
//     <div>" . $_SESSION['username'] . "</div>
//     <div>" . $_SESSION['login role'] . "</div>
//     <a href='../shared/logout.php' class='text-white'>
//     Logout
//     </a>
// </div>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
<!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-white ">
        <div class="container-fluid">
        <a class="navbar-brand text-dark" href="view.php">
            <img src="https://media.onetimepim.com/_internal/athena/pages/integrations/shopify/shopify.png" alt="Brand Logo" class="me-2" style="height: 40px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="d-flex gap-3 bg-white p-1 ps-3 m-0">
        <a class="nav-link active text-dark" href="home.php">
            Add Product
        </a>
        <a class="nav-link active text-dark" href="view.php">
           View Product
        </a>
        <a class="nav-link active text-dark" href="ownerdetails.php">
            View Orders
        </a>
    </div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-dark" >UserID: <?php echo $_SESSION['userid']; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark">Username: <?php echo $_SESSION['username']; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark">Role: <?php echo $_SESSION['login role']; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="../shared/logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXlXjo0QsCddgVf5m9zYS3lyxvlE3IS8rWbbFINKoFywseC8hZC7flpmRmYp"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhG81rG7+T6V4gf8AB0h7QmC3Bz/f44CRJmWxzqE5UebK3sl0xa5IYfTv5Q"
        crossorigin="anonymous"></script>
</body>

</html>