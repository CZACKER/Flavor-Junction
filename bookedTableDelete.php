<?php
include 'databaseConnecting.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM bookTable WHERE id=$id";
    $data = mysqli_query($connection, $query);

    if ($data) {
        header('Location: bookedTableData.php');
        exit();
    } else {
        echo "Error deleting record.";
    }
}
?>