<?php
$pageTitle = 'Детайли за пратка';
include_once 'header.php';
include_once 'includes/dbh.inc.php';
include_once 'includes/auth_check.php';

$shipment_id  = $_GET['infoid'];
$sql = "SELECT * FROM shipment_history sh
JOIN shipment s ON sh.shipment_id = s.shipment_id
JOIN users u ON s.usersId = u.usersId
WHERE sh.shipment_id = '$shipment_id' ORDER BY update_time DESC;";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$senderName = $row['sender_name'];
$senderPhoneNum = $row['sender_phone_number'];
$senderEmail = $row['sender_email'];
$recipientName = $row['recipient_name'];
$recipientPhoneNum = $row['recipient_phone_number'];
$recipientEmail = $row['recipient_email'];
$deliveryAddress = $row['delivery_address'];

$trackingID = $row['tracking_id'];
$status = $row['status'];
$price = $row['price'];

$nameUser = $row['usersName'];
$idUser = $row['usersId'];
$username = $row['usersUid'];
$location = $row['location'];
$dateUpdate = $row['update_time'];


?>
<div class="container mt-5">
    <h1 class="text-center my-3">Детайли за пратка
    <?php echo '<a href="edit_info_shipment.php?infoid=' . $shipment_id . '" class="btn btn-info text-light" style="text-decoration: none"><i class="fas fa-edit"></i></a>';
    ?>
    </h1>
    <hr>
    <form method="post">
    <div class="row mb-4">
            <div class="col">
                <div class="form-group">
                    <label for="deliveryAddress">Адрес за доставка</label>
                    <input readonly value="<?php echo $deliveryAddress; ?>" type=" text" class="form-control" id="deliveryAddress" name="deliveryAddress">
                </div>
            </div>
            <div class="col">
                <div class="col">
                    <div class="form-group">
                        <label for="location">Местоположение</label>
                        <input readonly value="<?php echo $location; ?>" type=" text" class="form-control" id="location" name="location">
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <div class="form-group">
                    <label for="trackingID">Код за проследяване</label>
                    <input readonly value="<?php echo $trackingID; ?>" type="text" class="form-control" id="trackingID" name="trackingID">
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="status">Статус</label>
                    <input readonly value="<?php echo $status; ?>" type="text" class="form-control" id="status" name="status">
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="price">Цена</label>
                    <input readonly value="<?php echo $price; ?>" type="number" class="form-control" id="price" name="price">
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="">Време на обновяване</label>
                    <input readonly value="<?php echo $dateUpdate; ?>" type="text" class="form-control" id="" name="">
                </div>
            </div>

            <div class="col">
                <div class="form-group">
                    <label for="shipment_id">ИД на пратка</label>
                    <input readonly value="<?php echo $shipment_id; ?>" type="number" class="form-control" id="shipment_id" name="shipment_id">
                </div>
            </div>
        </div>
        <hr>
        <div class="row mb-4">
            <h4 class="text-center">Данни на подател</h4>
            <div class="col">
                <div class="form-group">
                    <label for="senderName">Имена</label>
                    <input readonly value="<?php echo $senderName; ?> " type="text" class="form-control" id="senderName" name="senderName">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="senderPhoneNum">Телефонен номер</label>
                    <input readonly value="<?php echo $senderPhoneNum; ?>" type=" text" class="form-control" id="senderPhoneNum" name="senderPhoneNum">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="senderEmail">Имейл</label>
                    <input readonly value="<?php echo $senderEmail; ?>" type=" email" class="form-control" id="senderEmail" name="senderEmail">
                </div>
            </div>
        </div>
        <hr>
        <div class="row mb-4">
            <h4 class="text-center">Данни на получател</h4>
            <div class="col">
                <div class="form-group">
                    <label for="recipientName">Имена</label>
                    <input readonly value="<?php echo $recipientName; ?>" type=" text" class="form-control" id="recipientName" name="recipientName">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="recipientPhoneNumber">Телефонен номер</label>
                    <input readonly value="<?php echo $recipientPhoneNum; ?>" type=" text" class="form-control" id="recipientPhoneNumber" name="recipientPhoneNumber">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="recipientEmail">Имейл</label>
                    <input readonly value="<?php echo $recipientEmail; ?>" type=" email" class="form-control" id="recipientEmail" name="recipientEmail">
                </div>
            </div>
        </div>
        <hr>
        <div class="row mb-4">
            <h4 class="text-center">Добавена от:</h4>
            <div class="col">
                <div class="form-group ">
                    <label for="nameUser">Имена</label>
                    <input readonly value="<?php echo $nameUser; ?>" type=" text" class="form-control" id="nameUser" name="nameUser">
                </div>
            </div>
            <div class="col">
                <div class="form-group ">
                    <label for="idUser">ИД</label>
                    <input readonly value="<?php echo $idUser; ?>" type="number" class="form-control" id="idUser" name="idUser">

                </div>
            </div>
            <div class="col">
                <div class="form-group ">
                    <label for="username">Потребителско име</label>
                    <input readonly value="<?php echo $username; ?>" type=" text" class="form-control" id="username" name="username">
                </div>
            </div>
        </div>
    </form>
</div>
</body>

</html>