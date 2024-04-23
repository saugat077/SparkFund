<?php
// Include the database configuration file
include '../db.php';

//Check if the entry ID is provided
if(isset($_GET['id'])){
    // Get the entry ID
    $fundId = $_GET['id'];

    // Delete the entry from the database
    $query = "DELETE FROM funds WHERE fund_id=" . $fundId;
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if($result){
        // Redirect to the my_fundraisers page
        header('Location: ../pages/dashboard.php?option=my_fundraisers');
    }else{
        // Display an error message
        echo 'Error: Unable to delete the entry.';
    }
}

?>