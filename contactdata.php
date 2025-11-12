<?php
include 'databaseConnecting.php';

if (isset($_POST['contactSave'])) {
    $contactName = $_POST['contactName'];
    $contactEmail = $_POST['contactEmail'];
    $contactNumber = $_POST['contactNumber'];
    $contactMessage = $_POST['contactMessage'];

    // Set cookies to remember user input (expire in 30 days)
    setcookie("contactName", $contactName, time() + (30 * 24 * 60 * 60));
    setcookie("contactEmail", $contactEmail, time() + (30 * 24 * 60 * 60));
    setcookie("contactNumber", $contactNumber, time() + (30 * 24 * 60 * 60));
    setcookie("contactMessage", $contactMessage, time() + (30 * 24 * 60 * 60));

    // Use a prepared statement to prevent SQL injection
    $stmt = $connection->prepare("INSERT INTO contact(Name, Email, Number, Message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $contactName, $contactEmail, $contactNumber, $contactMessage);

    if ($stmt->execute()) {
        header('Location: contact.html');
        exit();
    } else {
        echo "Data not inserted: " . $stmt->error;
    }

    $stmt->close();
}
?>
