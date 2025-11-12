<?php
include 'databaseConnecting.php';

if (isset($_POST['bookingSave'])) {
    $bookingName = $_POST['bookingName'];
    $bookingEmail = $_POST['bookingEmail'];
    $bookingNumber = $_POST['bookingNumber'];
    $bookingDate = $_POST['bookingDate'];
    $bookingTime = $_POST['bookingTime'];
    $bookingGuests = $_POST['bookingGuests'];
    $seatPreference = $_POST['seating'];

    $query = "INSERT INTO bookTable (Full_Name, Email, Ph_Number, Date, Time, Members, Seat_pref) VALUES ('$bookingName', '$bookingEmail', '$bookingNumber', '$bookingDate', '$bookingTime', '$bookingGuests', '$seatPreference')";

    $data = mysqli_query($connection, $query);

    if ($data) {
        header('Location: bookTable.html'); // Redirect to the table display page
        exit();
    } else {
        echo "Data not inserted";
    }
}
?>
