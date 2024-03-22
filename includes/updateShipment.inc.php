<?php
include_once 'auth_check.php';
include_once 'dbh.inc.php';


$id = $_GET['updateid'];
$status = "";
$location = "";
$tracking_id = "";

// Retrieve existing status, location, and tracking_id from the database
$sql = "SELECT status, location, tracking_Id FROM shipment_history WHERE shipment_id = $id ORDER BY update_time DESC LIMIT 1";
$result = mysqli_query($conn, $sql);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $status = $row['status'];
    $location = $row['location'];
    $tracking_id = $row['tracking_Id'];
}

// Check if the form is submitted
if (isset($_POST["submit"])) {
    $status = $_POST["status"];
    $location = $_POST["location"];

    // Insert the new entry into shipment_history table
    $sql = "INSERT INTO shipment_history (shipment_id, tracking_id, location, status) VALUES ($id, '$tracking_id', '$location', '$status')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<div class="d-flex justify-content-center text-light pt-1 bg-success">
        <i class="p-1 fas fa-check-circle"></i>Пратката бе обновена успешно.';
        echo '<a href="https://courierwebsite.000webhostapp.com/last_updates.php" style="color: #ffc107; text-decoration: none; margin-left: 5px;">Виж "Последни обновявания"</a>';
        
        
        
        
        echo '</div>';
    } else {
        echo 'Failed to insert the entry.';
        die(mysqli_error($conn));
    }
}