<?php
session_start();
if($_SESSION['login status']==false){
    echo "Unauthorised Access";
    exit;
}
if($_SESSION['login role']!='Customer'){
    echo "Illegal Attempt";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .search-form {
            position: relative;
            display: flex;
            align-items: center;
            gap: 10px;
            margin-right: 20px;
        }

        .search-form input {
            padding: 5px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            margin-right: 10px;
        }

        .search-form button {
            padding: 5px 10px;
            border: 1px solid #ced4da;
            background-color: #28a745;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        .search-form button:hover {
            background-color: #218838;
        }

        .search-results {
            position: absolute;
            top: calc(100% + 10px);
            left: 0;
            width: 100%;
            max-height: 200px;
            overflow-y: auto;
            background-color: white;
            border: 1px solid #ced4da;
            border-radius: 5px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .search-results a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: black;
            border-bottom: 1px solid #ced4da;
        }

        .search-results a:hover {
            background-color: #e2e6ea;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-white">
        <div class="container-fluid">
            <a class="navbar-brand text-dark" href="home.php">
                <img src="https://media.onetimepim.com/_internal/athena/pages/integrations/shopify/shopify.png" alt="Brand Logo" class="me-2" style="height: 40px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="d-flex gap-3 bg-white p-1 ps-3 m-0">
                <a class="nav-link active text-dark" href="home.php">Home</a>
                <a class="nav-link active text-dark" href="viewcart.php">View Cart</a>
                <a class="nav-link active text-dark" href="vieworders.php">View Orders</a>
                <div class="search-form">
                    <input type="search" id="search-input" placeholder="Search" aria-label="Search">
                    <button type="submit">Search</button>
                    <div class="search-results" id="search-results"></div>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-dark">UserID:<?php echo $_SESSION['userid']; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark">Username:<?php echo $_SESSION['username']; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark">Role:<?php echo $_SESSION['login role']; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="../shared/logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('search-input').addEventListener('input', function () {
                const query = this.value;
                if (query.length > 2) {
                    fetch(`search.php?query=${encodeURIComponent(query)}`)
                        .then(response => response.json())
                        .then(data => {
                            const searchResults = document.getElementById('search-results');
                            searchResults.innerHTML = '';
                            data.forEach(product => {
                                const productLink = document.createElement('a');
                                productLink.href = `reviews.php?pid=${product.pid}`;
                                productLink.textContent = product.name;
                                searchResults.appendChild(productLink);
                            });
                        })
                        .catch(error => {
                            console.error('Error fetching search results:', error);
                        });
                } else {
                    document.getElementById('search-results').innerHTML = '';
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXlXjo0QsCddgVf5m9zYS3lyxvlE3IS8rWbbFINKoFywseC8hZC7flpmRmYp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhG81rG7+T6V4gf8AB0h7QmC3Bz/f44CRJmWxzqE5UebK3sl0xa5IYfTv5Q" crossorigin="anonymous"></script>
</body>

</html>
