<?php
include 'databaseConnecting.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM cart WHERE Id=$id";
    $data = mysqli_query($connection, $query);

    if ($data) {
        header('Location: mycart.php');
        exit();
    } else {
        echo "Error deleting record.";
    }
}
?>