<?php
$pageTitle = 'Промени информация за пратка';
include_once 'header.php';
include_once 'includes/dbh.inc.php';
include_once 'includes/auth_check.php';

$shipment_id  = $_GET['infoid'];
$sql = "SELECT * FROM shipment WHERE shipment_id = '$shipment_id';";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$senderName = $row['sender_name'];
$senderPhoneNum = $row['sender_phone_number'];
$senderEmail = $row['sender_email'];
$recipientName = $row['recipient_name'];
$recipientPhoneNum = $row['recipient_phone_number'];
$recipientEmail = $row['recipient_email'];
$deliveryAddress = $row['delivery_address'];

?>

<?php 
$id = $_GET['infoid'];

// Check if the form is submitted
if (isset($_POST["submit"])) {
    $deliveryAddress = $_POST["deliveryAddress"];
    $senderName = $_POST["senderName"];
    $senderPhoneNum = $_POST["senderPhoneNum"];
    $senderEmail = $_POST["senderEmail"];
    $recipientName = $_POST["recipientName"];
    $recipientPhoneNum = $_POST["recipientPhoneNumber"];
    $recipientEmail = $_POST["recipientEmail"];

    // Insert the new entry into shipment_ table
    $sql = "UPDATE shipment SET 
    sender_name = '$senderName', 
    sender_phone_number = '$senderPhoneNum', 
    sender_email = '$senderEmail', 
    delivery_address = '$deliveryAddress', 
    recipient_name = '$recipientName', 
    recipient_phone_number = '$recipientPhoneNum', 
    recipient_email = '$recipientEmail' 
WHERE shipment_id = '$shipment_id';";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<div class="d-flex justify-content-center text-light pt-1 bg-success">
    <i class="p-1 fas fa-check-circle"></i>Информацията за пратката бе променена успешно.';
    
    echo '<a href="https://courierwebsite.000webhostapp.com/info_shipment.php?infoid=' . $id . 
    '" style="color: #ffc107; text-decoration: none; margin-left: 5px;">Виж промените</a>'
   . '</div>';

    } else {
        echo 'Неуспех при промяната на данните.';
        die(mysqli_error($conn));
    }
}
?>
<div class="container mt-5">
    <h1 class="text-center my-3">Промени информация за пратка</h1>
    <hr>
    <form method="post">
        <div class="row mb-4">
            <div class="col">
                <div class="form-group">
                    <label for="deliveryAddress">Адрес за доставка</label>
                    <input value="<?php echo $deliveryAddress; ?>" type=" text" class="form-control" id="deliveryAddress" name="deliveryAddress">
                </div>
            </div>
        </div>

        <hr>
        <div class="row mb-4">
            <h4 class="text-center">Данни на подател</h4>
            <div class="col">
                <div class="form-group">
                    <label for="senderName">Имена</label>
                    <input value="<?php echo $senderName; ?> " type="text" class="form-control" id="senderName" name="senderName">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="senderPhoneNum">Телефонен номер</label>
                    <input value="<?php echo $senderPhoneNum; ?>" type=" text" class="form-control" id="senderPhoneNum" name="senderPhoneNum">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="senderEmail">Имейл</label>
                    <input value="<?php echo $senderEmail; ?>" type=" email" class="form-control" id="senderEmail" name="senderEmail">
                </div>
            </div>
        </div>
        <hr>
        <div class="row mb-4">
            <h4 class="text-center">Данни на получател</h4>
            <div class="col">
                <div class="form-group">
                    <label for="recipientName">Имена</label>
                    <input value="<?php echo $recipientName; ?>" type=" text" class="form-control" id="recipientName" name="recipientName">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="recipientPhoneNumber">Телефонен номер</label>
                    <input value="<?php echo $recipientPhoneNum; ?>" type=" text" class="form-control" id="recipientPhoneNumber" name="recipientPhoneNumber">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="recipientEmail">Имейл</label>
                    <input value="<?php echo $recipientEmail; ?>" type=" email" class="form-control" id="recipientEmail" name="recipientEmail">
                </div>
            </div>
        </div>
        <button name="submit" type="submit" class="btn btn-dark">Запази</button>
    </form>
</div>
</body>

</html>

