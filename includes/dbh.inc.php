<?php
$serverName = "localhost";
$dBUsername = "id21023653_dbusername";
$dBPassword = "Admin_123";
$dBName = "id21023653_courierwebsitedb";

//Connecting the database
$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);
if (!$conn) {
    die("Грешка при свързването:  " . mysqli_connect_error());
} else {
}