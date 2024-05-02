<?php
// Include database connection code (db.php or similar)
include '../db.php';

// Start session
session_start();

// Store eventId and userId in session variables
$_SESSION['eventId'] = $_POST['eventId'];
$_SESSION['userId'] = $_POST['userId'];

// Prepare SQL query to retrieve donor name and email
// Prepare SQL query to retrieve donor name and email
$query = "SELECT CONCAT(fname, ' ', lname) AS donorname, email FROM users WHERE id = '" . $_SESSION['userId'] . "'";

// Execute SQL query
$result = mysqli_query($conn, $query);

// Check if query executed successfully
if ($result) {
    // Fetch donor name and email from the result
    $row = mysqli_fetch_assoc($result);
    $donorName = $row['donorname'];
    $donorEmail = $row['email'];

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
        CURLOPT_POSTFIELDS => '{
            "return_url": "http://localhost/sparkfund/backend/khalti_return.php?",
            "website_url": "http://localhost",
            "amount": "99999",
            "purchase_order_id": "Order01",
            "purchase_order_name": "test",
            "customer_info": {
                "name": "' . $donorName . '",
                "email": "' . $donorEmail . '",
                "phone": "9800000001"
            }
        }',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Key 32567c683cd7483cb222795afd7af5a5',
            'Content-Type: application/json',
        ),
    ));

    // Execute cURL request
    $response = curl_exec($curl);

    // Close cURL
    curl_close($curl);

    // Decode the response
    $response = json_decode($response, true);

    // Get payment URL from the response
    $payment_url = $response['payment_url'];

    // Redirect to payment URL
    header('Location: ' . $payment_url);
} else {
    // Handle database query error
    echo "Error: " . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>
