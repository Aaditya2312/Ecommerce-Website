<?php
include "authguard.php";
include "../shared/connection.php";
$pid = $_GET['pid'];

// Handle review submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['rating']) && isset($_POST['comment'])) {
    $rating = intval($_POST['rating']);
    $comment = $_POST['comment'];
    $user_id = $_SESSION['userid'];

    $stmt = $conn->prepare("INSERT INTO reviews (product_id, user_id, rating, comment) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiis", $pid, $user_id, $rating, $comment);
    $stmt->execute();
    $stmt->close();
}

// Fetch product details
$sql_result = mysqli_query($conn, "SELECT * FROM product WHERE pid=$pid");
$product = mysqli_fetch_assoc($sql_result);
$name = $product['name'];
$price = $product['price'];
$detail = $product['detail'];
$imgpath = $product['impath'];

// Fetch reviews
$reviews_result = mysqli_query($conn, "SELECT reviews.*, user.username FROM reviews JOIN user ON reviews.user_id = user.userid WHERE product_id=$pid ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo htmlspecialchars($name); ?> - Product Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .reviews-container {
            max-height: 200px; /* Adjust the height as needed */
            overflow-y: scroll;
        }

        /* .product-image{
            max-width: 100%;
            height:75%;
        } */
        .product-image img {
            max-width: 100%;
            max-height: 400px; /* Adjust this value to fit within the desired page height */
            object-fit: contain; /* Ensures the image scales proportionally */
            margin-top : 50px;
        }
    </style>
</head>

<body>
    
    <div class="container mt-5">
        <div class="row">
            <!-- Product Image -->
            <div class="col-lg-6 product-image">
                <img src="<?php echo htmlspecialchars($imgpath); ?>" class="img-fluid" alt="Product Image">
            </div>
            <!-- Product Details -->
            <div class="col-lg-6">
                <h1><?php echo htmlspecialchars($name); ?></h1>
                <p><?php echo htmlspecialchars($detail); ?></p>
                <h2>Rs <?php echo htmlspecialchars($price); ?></h2>

                <!-- Reviews Section -->
                <h3 class="mt-4">User Reviews</h3>

                <!-- Review Form -->
                <form method="POST" class="mb-4">
                    <div class="mb-3">
                        <label for="rating" class="form-label">Rating</label>
                        <select id="rating" name="rating" class="form-select" required>
                            <option value="5">5 - Excellent</option>
                            <option value="4">4 - Very Good</option>
                            <option value="3">3 - Good</option>
                            <option value="2">2 - Fair</option>
                            <option value="1">1 - Poor</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="comment" class="form-label">Comment</label>
                        <textarea id="comment" name="comment" class="form-control" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Review</button>
                </form>

                <!-- Display Reviews -->
                <div class="reviews-container">
                    <?php while ($review = mysqli_fetch_assoc($reviews_result)) : ?>
                        <div class="border rounded p-3 mb-3">
                            <h5><?php echo htmlspecialchars($review['username']); ?>
                                <small class="text-muted"><?php echo date("d-m-Y", strtotime($review['created_at'])); ?></small>
                            </h5>
                            <p>Rating: <?php echo htmlspecialchars($review['rating']); ?>/5</p>
                            <p><?php echo htmlspecialchars($review['comment']); ?></p>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
    <?php include '../shared/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>