<?php
include_once 'auth_check.php';
include_once 'dbh.inc.php';

$id = $_GET['updateid'];

$sql = "SELECT * FROM users WHERE usersid = $id";


$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);



$name = $row['usersName'];
$email = $row['usersEmail'];
$phonenumber = $row['usersPhoneNumber'];
$username = $row['usersUid'];

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phonenumber = $_POST["phonenumber"];
    $username = $_POST["uid"];

    $sql = "UPDATE users SET usersId = $id,
    usersName = '$name', 
    usersEmail = '$email',
    usersPhoneNumber = '$phonenumber',
    usersUid = '$username' 
    WHERE usersId = $id;";

   $result = mysqli_query($conn, $sql);
if ($result) {
    echo '<div class="d-flex justify-content-center text-light pt-1 bg-success"><i class="p-1 fas fa-check-circle"></i> Профилът бе редактиран успешно.';
    if ($id == $_SESSION["userid"]) {
        echo '<a href="https://courierwebsite.000webhostapp.com/profile.php" style="color: #ffc107; text-decoration: none; margin-left: 5px;">Виж промените</a>';
    } else {
        echo '<a href="https://courierwebsite.000webhostapp.com/users_list.php" style="color: #ffc107; text-decoration: none; margin-left: 5px;">Обратно към списъка</a>';
    }
    echo '</div>';
} else {
    echo 'failed';
    die(mysqli_error($conn));
}
}
