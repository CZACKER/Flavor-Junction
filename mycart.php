<?php include 'databaseConnecting.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="images/Favicon.png" type="image/x-icon">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap');

        body {
            font-family: 'Ubuntu', sans-serif;
        }
    </style>
    <title>Flavor Junction - Home Page</title>
</head>

<body>
    <!-- HEADER SECTION -->
    <header>
        <div class="slogan">
            <p>Welcome to Flavor Junction a Best Quality Restaurant</p>
        </div>
    </header>
    <nav class="navbar navbar-expand-lg navbar-light bg-body shadow-lg sticky-top">
        <div class="container-fluid">
            <div class="logoContainer" style=" left: 140px;">
                <a class="navbar-brand" href="home.html"><img src="images/Favicon.png" alt="logo"></a>
                <a href="home.html"
                    style="font-size: larger; text-decoration: none; color: rgb(218, 157, 35); font-weight: 600;">Flavor
                    Junction</a>
            </div>
            <div class="collapse navbar-collapse d-flex justify-content-start " id="navbarNavDropdown"
                style="font-family: 'Ubuntu', sans-serif; font-weight: 500; font-size: 17px;">
                <ul class="navbar-nav d-flex justify-content-evenly" style="width: 800px; left: 160px;">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="home.html"
                            style="color: rgb(69, 69, 69);">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html" style="color: rgb(69, 69, 69);">About</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false" style="color: rgb(69, 69, 69);">
                            Shop
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="shop.html">All Items</a></li>
                            <li><a class="dropdown-item" href="shop.html#appetizers">Appetizers</a></li>
                            <li><a class="dropdown-item" href="shop.html#salads">Salads</a></li>
                            <li><a class="dropdown-item" href="shop.html#soups">Soups</a></li>
                            <li><a class="dropdown-item" href="shop.html#main-courses">Main Courses</a></li>
                            <li><a class="dropdown-item" href="shop.html#sides">Sides</a></li>
                            <li><a class="dropdown-item" href="shop.html#desserts">Desserts</a></li>
                            <li><a class="dropdown-item" href="shop.html#beverages">Beverages</a></li>
                            <li><a class="dropdown-item" href="shop.html#special-items">Special Items</a></li>
                            <li><a class="dropdown-item" href="shop.html#kids-menu">Kids' Menu</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html" style="color: rgb(69, 69, 69);">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="CartLink">
                <a href="#" class="mycart"><button>My Cart</button></a>
            </div>
            <div class="bookLink">
                <a href="bookTable.html" class="bookTable"><button>Book a Table</button></a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
    <h1 class="text-center mb-4">MY CART</h1>

    <div class="row justify-content-center">
        <?php
        $query = "SELECT * FROM cart";
        $data = mysqli_query($connection, $query);
        $result = mysqli_num_rows($data);
        $totalPrice = 0;

        if ($result) {
            while ($row = mysqli_fetch_array($data)) {
                $totalPrice += $row['Price'];
                ?>
                <div class="col-md-8">
                    <div class="card mb-3 shadow-lg border-0 rounded-3">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title mb-1"><?php echo $row['Item_Name']; ?></h5>
                                <p class="card-text text-muted">Price: ₹<?php echo number_format($row['Price'], 2); ?></p>
                            </div>
                            <a href="cartDelete.php?id=<?php echo $row['Id']; ?>" class="btn btn-outline-danger btn-sm">
                                <i class="fa fa-trash"></i> Remove
                            </a>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p class='text-center text-muted'>Your cart is empty!</p>";
        }
        ?>
    </div>

    <!-- Total Price -->
    <div class="text-end mt-4">
        <h4><strong>Total:</strong> ₹<?php echo number_format($totalPrice, 2); ?></h4>
    </div>

    <!-- Checkout and Continue Shopping Buttons -->
    <div class="text-center mt-3">
        <a href="checkout.html" class="btn btn-success px-4">Proceed to Checkout</a>
        <a href="shop.html" class="btn btn-secondary px-4">Continue Shopping</a>
    </div>
</div>



    <!-- Footer -->
    <footer class="text-light pt-4 mt-5" style="background-color: rgb(69, 69, 69);">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h5>About Us</h5>
                    <p>Flavor Junction is dedicated to providing an unforgettable dining experience with a variety of
                        exquisite cuisines, prepared with the finest ingredients.</p>
                </div>
                <div class="col-md-3">
                    <h5>Contact Us</h5>
                    <ul class="list-unstyled">
                        <li><strong>Address:</strong>123 Lorem Street, Ipsum, CA-12345</li>
                        <li><strong>Phone:</strong>+91 123-456-7890</li>
                        <li><strong>Email:</strong>flavorjunction5@gmail.com</li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="home.html" class="text-light">Home</a></li>
                        <li><a href="about.html" class="text-light">About</a></li>
                        <li><a href="shop.html" class="text-light">Shop</a></li>
                        <li><a href="contact.html" class="text-light">Contact</a></li>
                        <li><a href="bookTable.html" class="text-light">Book a Table</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Follow Us</h5>
                    <div class="d-flex">
                        <a href="https://www.facebook.com/" class="text-light me-2" target="_blank"
                            title="Flavor Junction on Facebook"><i class="fa fa-facebook-f"
                                style="font-size:25px"></i></a>
                        <a href="https://twitter.com" class="text-light me-2" target="_blank"
                            title="Flavor Junction on Twitter"><i class="fa fa-twitter" style="font-size:25px"></i></a>
                        <a href="https://www.instagram.com/" class="text-light me-2" target="_blank"
                            title="Flavor Junction on Instagram"><i class="fa fa-instagram"
                                style="font-size:25px"></i></a>
                        <a href="https://in.linkedin.com/" class="text-light me-2" target="_blank"
                            title="Flavor Junction on Linkedin"><i class="fa fa-linkedin"
                                style="font-size:25px"></i></a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="text-center pb-3">
                <p>&copy; 2024 Flavor Junction. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>

</html>