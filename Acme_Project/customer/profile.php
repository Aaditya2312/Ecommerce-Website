<?php
include "authguard.php";
$id = $_SESSION['userid'];

include "../shared/connection.php";
$sql_result = mysqli_query($conn, "select * from user where userid='$id'");

while ($dbrow = mysqli_fetch_assoc($sql_result)) {
    $uname = $dbrow['username'];
    $name = $dbrow['name'];
    $PhNo = $dbrow['Phoneno'];
    $email = $dbrow['email'];
    $address = $dbrow['address'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        /* body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            display: flex;
            flex-direction: column;
            gap: 24px;
            padding: 16px;
            max-width: 1280px;
            margin: 0 auto;
        }

        .header {
            font-size: 24px;
            margin-bottom: 12px;
        }

        .form {
            display: flex;
            flex: content;
            flex-direction: column;
            gap: 16px;
            align-items: start;
            justify-content: center;
        }

        .form label {
            font-size: 14px;
            color: #4a5568;
        }

        .form input {
            padding: 8px;
            border: 1px solid #cbd5e0;
            border-radius: 4px;
        }

        .button {
            padding: 8px 16px;
            background-color: #3182ce;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #2b6cb0;
        }

        .orders {
            margin-top: 12px;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .order-item {
            display: flex;
            justify-content: space-between;
            padding: 12px;
            border-radius: 4px;
            background-color: #edf2f7;
            text-decoration: none;
            color: #2d3748;
        }

        .order-item:hover {
            background-color: #e2e8f0;
        }

        .order-item:nth-child(even) {
            background-color: #f7fafc;
        } */
        .vh-100 {
            height: 100vh;
        }

        .login-section {
            background-color: #f8f9fa;
            padding: 50px;
        }

        .image-section {
            background: url('your-image-url.jpg') no-repeat center center;
            background-size: cover;
        }
    </style>
</head>

<body>
<div class="container-fluid vh-100 d-flex">
        <div class="row flex-grow-1">
            <div class="col-md-6 image-section">
                <!-- Image section on the left -->
                <img src="https://atlas-content-cdn.pixelsquid.com/stock-images/icon-user-profile-update-computer-XlEaaD8-600.jpg"
                    class="img-fluid w-100 h-100" alt="Signup Image" style="object-fit:contain;" />
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-center bg-light">
            <form action="updateuser.php" method="post" class="form">
            <h4 class="text-center mb-3">Update Profile</h4>
                <input required class="form-control mt-4" type="text" name="username" placeholder="username" value="<?php echo htmlspecialchars($uname); ?>" />
                <input required class="form-control mt-4" type="text" name="name" placeholder="name" value="<?php echo htmlspecialchars($name); ?>" />
                <input required class="form-control mt-4" type="number" name="phoneno" placeholder="phno" value="<?php echo htmlspecialchars($PhNo); ?>" />
                <input required class="form-control mt-4" type="email" name="email" placeholder="email" value="<?php echo htmlspecialchars($email); ?>" />
                <input required class="form-control mt-4" type="text" placeholder="address" name="address" value="<?php echo htmlspecialchars($address); ?>">
                <div class="text-center mt-4">
                        <button class="btn btn-info">Submit</button>
                    </div>
            </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXlXjo0QsCddgVf5m9zYS3lyxvlE3IS8rWbbFINKoFywseC8hZC7flpmRmYp"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhG81rG7+T6V4gf8AB0h7QmC3Bz/f44CRJmWxzqE5UebK3sl0xa5IYfTv5Q"
        crossorigin="anonymous"></script>
</body>

</html>