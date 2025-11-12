<?php
include 'databaseConnecting.php';

if (isset($_POST['itemSave'])) {
    $itemName = mysqli_real_escape_string($connection, $_POST['itemName']);
    $itemPrice = $_POST['itemPrice'];

    // Ensure the price is numeric and remove unwanted characters
    $itemPrice = preg_replace('/[^0-9.]/', '', $itemPrice);

    if (!is_numeric($itemPrice) || empty($itemPrice)) {
        die("Invalid price input.");
    }

    // Insert data into the cart table
    $query = "INSERT INTO cart (Item_Name, Price) VALUES ('$itemName', '$itemPrice')";

    if (mysqli_query($connection, $query)) {
        // Store success status in localStorage and redirect
        echo "<script>
                localStorage.setItem('cartAdded', 'true'); 
                window.location.href='shop.html';
              </script>";
        exit();
    } else {
        echo "<script>
                alert('Failed to add item. Error: " . mysqli_error($connection) . "'); 
                window.location.href='shop.html';
              </script>";
    }
}
?>
