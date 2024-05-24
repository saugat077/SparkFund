<?php
// Start session
session_start();

// Include database connection code (db.php or similar)
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['userId'];
    $event_id = $_POST['eventId'];
    $donation_amount = $_POST['donationAmount'];
    $converted_amount = (float)$donation_amount * 100;

    // Use a prepared statement to safely fetch user information
    $query = "SELECT fname, lname, number, email FROM users WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();

    if ($user) {
        try {
            // Initialize cURL to make API call to Khalti
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://a.khalti.com/api/v2/epayment/initiate/',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => json_encode(array(
                    "return_url" => "http://localhost/sparkfund/backend/khalti_return.php?",
                    "website_url" => "http://localhost",
                    "amount" => $converted_amount,
                    "purchase_order_id" => "Order01",
                    "purchase_order_name" => "test",
                    "customer_info" => array(
                        "name" => $user['fname'] . ' ' . $user['lname'],
                        "email" => $user['email'],
                        "phone" => $user['number']
                    )
                )),
                CURLOPT_HTTPHEADER => array(
                    'Authorization: Key 32567c683cd7483cb222795afd7af5a5',
                    'Content-Type: application/json',
                ),
            ));

            // Execute cURL request
            $response = curl_exec($curl);
            $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            curl_close($curl);

            if ($http_code == 200) { // Check if the request was successful
                $response_data = json_decode($response, true);
                $payment_url = $response_data['payment_url'];

                // Insert data into the database
                $insert_query = $conn->prepare('INSERT INTO donations (funds_id, user_id, amount) VALUES (?, ?, ?)');
                $insert_query->bind_param('iii', $event_id, $user_id, $donation_amount);
                $insert_query->execute();
                $insert_query->close();

                // Set session variables
                $_SESSION['eventId'] = $event_id;
                $_SESSION['userId'] = $user_id;
                $_SESSION['donationAmount'] = $donation_amount;
                $_SESSION['status'] = 'Donation successful';

                // Redirect to payment URL
                header('Location: ' . $payment_url);
                exit();
            } else {
                // Handle cURL error
                echo 'Error: ' . curl_error($curl);
            }
        } catch (Exception $e) {
            // Handle exception
            die('Error: ' . $e->getMessage());
        }
    } else {
        echo 'Error: User not found';
    }
} else {
    // Handle invalid request method
    echo 'Error: Invalid request method';
}
?>
