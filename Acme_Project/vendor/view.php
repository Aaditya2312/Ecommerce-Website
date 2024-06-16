<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .pdt-img {
            width: 100%;
            height:300px;
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
    ?>

    <!-- Carousel -->
    <!-- Image Slider -->
    <!-- <div id="imageSlider" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://t3.ftcdn.net/jpg/02/37/32/86/360_F_237328636_8JTUvMyTweop4AMEKbGzLDtLa76gh0tf.jpg" class="d-block w-100" alt="First slide">
            </div>
            <div class="carousel-item active">
                <img src="https://graphicsfamily.com/wp-content/uploads/edd/2023/06/E-commerce-Website-Product-Banner-Design-scaled.jpg" class="d-block w-100" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT6YRBSgfVYidXxf02eS71W5XDNFxcn4RvAYg&s" class="d-block w-100" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#imageSlider" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#imageSlider" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div> -->
    <!-- <div class="banner-image ms-40">
  <img src="https://graphicsfamily.com/wp-content/uploads/edd/2023/06/E-commerce-Website-Product-Banner-Design-scaled.jpg" class="w-50" alt="Banner Image">
  <div class="banner-text">
    <h2>This is a Banner Headline</h2>
    <p>Click here to learn more!</p>
  </div>
</div> -->
    <div class="container mt-4">
        <div class="row">
            <?php
            $sql_result = mysqli_query($conn, "SELECT * FROM product WHERE owner = $_SESSION[userid]");

            while ($dbrow = mysqli_fetch_assoc($sql_result)) {
                echo "<div class='col-md-4 mb-4'>";
                echo "<div class='card'>";
                echo "<img class='card-img-top pdt-img' src='{$dbrow['impath']}' alt='{$dbrow['name']}'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>" . $dbrow['name'] . "</h5>";
                echo "<p class='card-text price'>" . $dbrow['price'] . "</p>";
                echo "<p class='card-text'>" . $dbrow['stock'] . "</p>";
                echo "<p class='card-text'>" . $dbrow['detail'] . "</p>";
                echo "<div class='d-flex justify-content-between'>";
                echo "<a href='editdetails.php?pid={$dbrow['pid']}' class='btn btn-warning'>Edit</a>";
                echo "<a href='delete.php?pid={$dbrow['pid']}' class='btn btn-danger'>Delete</a>";
                // echo "<a href='ownerdetails.php' class='btn btn-info'>View Details</a>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXlXjo0QsCddgVf5m9zYS3lyxvlE3IS8rWbbFINKoFywseC8hZC7flpmRmYp"
        crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhG81rG7+T6V4gf8AB0h7QmC3Bz/f44CRJmWxzqE5UebK3sl0xa5IYfTv5Q"
        crossorigin="anonymous">
    </script>
</body>

</html>
