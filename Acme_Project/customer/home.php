<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        .pdt-img {
            width: 100%;
            height: 200px;
            object-fit: contain;
        }
        .price::after {
            content: " Rs";
        }
        .banner {
            width: 40%;
            height: auto;
        }
        .full-height-container {
            display: flex;
            flex-direction: column;
            height: 100vh;
        }
        /* .banner-container {
            margin-top:20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-bottom: 5px;
        } */
        .banner-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .banner-item {
            flex: 1 1 32%;
            margin-bottom: 5px;
        }
        .banner-item img {
            width: 100%;
            height: auto;
        }
        .card-body .price {
            color: red;
            font-size: 1.25rem;
            font-weight: bold;
        }
        .product-section {
            margin-top: 40px;
        }
        .product-section {
            flex: 2;
            overflow-y: auto;
        }
    </style>
</head>

<body>
    <?php
    include "authguard.php";
    include "menu.html";
    include "../shared/connection.php";
    ?>

<div class="container-fluid full-height-container">
        <div class="banner-container">
            <div class="banner-item">
                <img src="https://t3.ftcdn.net/jpg/02/37/32/86/360_F_237328636_8JTUvMyTweop4AMEKbGzLDtLa76gh0tf.jpg" class="banner" alt="First banner">
            </div>
            <div class="banner-item">
                <img src="https://www.shutterstock.com/image-illustration/exclusive-headphone-sale-banner-website-260nw-2179666957.jpg" class="banner" alt="Second banner">
            </div>
            <div class="banner-item">
                <img src="https://media.gettyimages.com/id/1282816695/vector/black-friday-sale-promotion-web-banner-heading-design-on-graphic-white-background-vector-for.jpg?s=1024x1024&w=gi&k=20&c=TLn-0O9r4DTZTsq34uY1ZW1bTBLnnN_dE1k952o3dGY=" class="banner" alt="Third banner">
            </div>
        </div>
    </div>

     <!-- Horizontal Line Divider -->
     <div class="container">
        <hr class="custom-divider">
    </div>


<div class='container product-section'>
     <div class='row'>

     <?php
    $sql_result = mysqli_query($conn, "SELECT * FROM product");

    while ($dbrow = mysqli_fetch_assoc($sql_result)) {
        echo "<div class='col-md-4 mb-4'>";
        echo "<div class='card'>";
        echo "<a href='reviews.php?pid=$dbrow[pid]'>
        <img class='card-img-top pdt-img' src='{$dbrow['impath']}' alt='{$dbrow['name']}'>
        </a>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>" . $dbrow['name'] . "</h5>";
        echo "<p class='card-text price'>" . $dbrow['price'] . "</p>";
        echo "<p class='card-text'>" . $dbrow['detail'] . "</p>";
        echo "<div class='d-flex justify-content-between'>";
        echo "<a href='addcart.php?pid=$dbrow[pid]'>
        <button class='btn btn-warning'>Add Cart</button>
       </a>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
    ?>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXlXjo0QsCddgVf5m9zYS3lyxvlE3IS8rWbbFINKoFywseC8hZC7flpmRmYp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhG81rG7+T6V4gf8AB0h7QmC3Bz/f44CRJmWxzqE5UebK3sl0xa5IYfTv5Q"
        crossorigin="anonymous"></script>

        <?php
        include "../shared/footer.php";
        ?>
</body>

</html>
