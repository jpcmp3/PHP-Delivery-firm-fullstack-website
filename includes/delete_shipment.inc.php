<?php
include_once 'dbh.inc.php';

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM shipment_history 
    WHERE shipment_id='$id'";
    $sql2 = "DELETE FROM shipment 
    WHERE shipment_id='$id'";

    $result = mysqli_query($conn, $sql);
    $result2 = mysqli_query($conn, $sql2);

    if ($result && $result2) {
        header("Location: https://courierwebsite.000webhostapp.com/shipment_list.php");
        exit();
    } else {
        echo 'Not deleted!';
        die(mysqli_error($conn));
    }
} else {
    echo 'Error parsing the id';
}
?>
