<?php
session_start();

include_once 'dbh.inc.php';
include_once 'functions.inc.php';
include_once 'generate_track_id.php';
include_once 'calculatePrice.inc.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION["userid"];
    $senderName = $_POST["senderName"];
    $senderPhoneNum = $_POST["senderPhoneNum"];
    $senderEmail = $_POST["senderEmail"];
    $address = $_POST["deliveryAddress"];
    $recipientName = $_POST["recipientName"];
    $recipientPhoneNumber = $_POST["recipientPhoneNumber"];
    $recipientEmail = $_POST["recipientEmail"];
    $weight = $_POST['weight'];
    $length = $_POST['length'];
    $width = $_POST['width'];
    $height = $_POST['height'];
    $price = calculateDeliveryPrice($_POST['weight'], $_POST['length'], $_POST['width'], $_POST['height']);

    $sql = "INSERT INTO shipment 
    (usersId, sender_name, sender_phone_number, sender_email,
    delivery_address, recipient_name, recipient_phone_number,
    recipient_email, price)
     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        die(mysqli_error($conn));
    }

    mysqli_stmt_bind_param(
        $stmt,
        "isssssssi",
        $userId,
        $senderName,
        $senderPhoneNum,
        $senderEmail,
        $address,
        $recipientName,
        $recipientPhoneNumber,
        $recipientEmail,
        $price
    );

    mysqli_stmt_execute($stmt);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "SELECT * FROM shipment ORDER BY shipment_id DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $shipment_id = $row['shipment_id'];

        $trackingId = generate_track_id();
        
        $current_location = $_POST["location"];
        $status = 'Регистрирана';

        $sql = "INSERT INTO shipment_history (shipment_id, tracking_id, location, status) VALUES (?, ?, ?, ?)";

        $stmt = mysqli_stmt_init($conn);

        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, "isss", $shipment_id, $trackingId, $current_location, $status);

            if (mysqli_stmt_execute($stmt)) {
                header("Location: ../added_shipment.php");
                exit();
            } else {
                echo 'Error executing the insert statement: ' . mysqli_error($conn);
            }
            mysqli_stmt_close($stmt);
        } else {
            echo 'Error preparing the insert statement: ' . mysqli_error($conn);
        }
    } else {
        echo 'Error executing the select statement: ' . mysqli_error($conn);
    }

    mysqli_close($conn);
}
