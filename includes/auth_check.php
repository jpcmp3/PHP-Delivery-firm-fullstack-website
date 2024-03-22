<?php
if (!isset($_SESSION["useruid"])){
    header("Location: https://courierwebsite.000webhostapp.com/login.php");
    exit();
} else {
}