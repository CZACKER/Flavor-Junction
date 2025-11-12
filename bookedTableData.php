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
                <a href="mycart.php" class="mycart"><button>My Cart</button></a>
            </div>
            <div class="bookLink">
                <a href="bookTable.html" class="bookTable"><button>Book a Table</button></a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
    <h1 class="text-center mb-4">Booked Table Data</h1>

    <div class="row justify-content-center">
        <?php
        $query = "SELECT * FROM bookTable";
        $data = mysqli_query($connection, $query);
        $result = mysqli_num_rows($data);

        if ($result) {
            while ($row = mysqli_fetch_array($data)) {
        ?>
                <div class="col-md-6">
                    <div class="card mb-3 shadow-lg border-0 rounded-3">
                        <div class="card-body">
                            <h5 class="card-title text-primary"><?php echo $row['Full_Name']; ?></h5>
                            <p class="card-text mb-1"><strong>Email:</strong> <?php echo $row['Email']; ?></p>
                            <p class="card-text mb-1"><strong>Phone:</strong> <?php echo $row['Ph_Number']; ?></p>
                            <p class="card-text mb-1"><strong>Date:</strong> <?php echo $row['Date']; ?></p>
                            <p class="card-text mb-1"><strong>Time:</strong> <?php echo $row['Time']; ?></p>
                            <p class="card-text mb-1"><strong>Members:</strong> <?php echo $row['Members']; ?></p>
                            <p class="card-text mb-1"><strong>Seat Preference:</strong> <?php echo $row['Seat_pref']; ?></p>
                            <div class="text-end mt-3">
                                <a href="bookedTableDelete.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-danger btn-sm">
                                    <i class="fa fa-trash"></i> Delete
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "<p class='text-center text-muted'>No Table is Booked!</p>";
        }
        ?>
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