<?php
$pageTitle = 'Добави пратка';
include_once 'header.php';
include_once 'includes/dbh.inc.php';
include_once 'includes/auth_check.php';
?>
<div class="container mt-5">
    <h1 class="text-center my-3">Добави пратка</h1>
    <hr>
    <form action="includes/add_shipment.inc.php" method="post">

        <div class="row mb-4">
            <h4 class="text-center">Данни на подател</h4>
            <div class="col">
                <div class="form-group">
                    <label for="senderName">Имена</label>
                    <input type="text" class="form-control" id="senderName" name="senderName" required oninvalid="this.setCustomValidity('Трябва да въведете имена')" oninput="this.setCustomValidity('')">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="senderPhoneNum">Телефонен номер</label>
                    <input type="text" class="form-control" id="senderPhoneNum" name="senderPhoneNum" required oninvalid="this.setCustomValidity('Трябва да въведете телефонен номер')" oninput="this.setCustomValidity('')">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="senderEmail">Имейл</label>
                    <input type="email" class="form-control" id="senderEmail" name="senderEmail" required oninvalid="this.setCustomValidity('Трябва да въведете имейл')" oninput="this.setCustomValidity('')">
                </div>
            </div>
        </div>
        <hr>
        <div class="row mb-4">
            <h4 class="text-center">Данни на получател</h4>
            <div class="col">
                <div class="form-group">
                    <label for="recipientName">Имена</label>
                    <input type="text" class="form-control" id="recipientName" name="recipientName" required oninvalid="this.setCustomValidity('Трябва да въведете имена')" oninput="this.setCustomValidity('')">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="recipientPhoneNumber">Телефонен номер</label>
                    <input type="text" class="form-control" id="recipientPhoneNumber" name="recipientPhoneNumber" required oninvalid="this.setCustomValidity('Трябва да въведете телефон')" oninput="this.setCustomValidity('')">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="recipientEmail">Имейл</label>
                    <input type="email" class="form-control" id="recipientEmail" name="recipientEmail" required oninvalid="this.setCustomValidity('Трябва да въведете имейл')" oninput="this.setCustomValidity('')">
                </div>
            </div>
        </div>

        <hr>
        <div class="row mb-4">
            <h4 class="text-center">Адреси</h4>
            <div class="col">
                <div class="form-group">
                    <label for="deliveryAddress">Адрес за доставка</label>
                    <input type="text" class="form-control" id="deliveryAddress" name="deliveryAddress" required oninvalid="this.setCustomValidity('Трябва да въведете адрес')" oninput="this.setCustomValidity('')">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="location">Адрес на клон</label>
                    <input type="text" class="form-control" id="location" name="location" required oninvalid="this.setCustomValidity('Трябва да въведете текущ адрес')" oninput="this.setCustomValidity('')">
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
        <h4 class="text-center">Размери</h4>
            <div class="col">
                <div class="form-group mb-4">
                    <label for="weight">Тегло (в кг.):</label>
                    <input type="number" class="form-control" id="weight" name="weight" step="0.1" required oninvalid="this.setCustomValidity('Трябва да въведете тегло')" oninput="this.setCustomValidity('')">
                    <div id="weightError" class="error-message"></div>
                </div>
            </div>
            <div class="col">
                <div class="form-group mb-4">
                    <label for="length">Дължина (см):</label>
                    <input type="number" class="form-control" id="length" name="length" required oninvalid="this.setCustomValidity('Трябва да въведете дължина')" oninput="this.setCustomValidity('')">
                    <div id="lengthError" class="error-message"></div>
                </div>
            </div>
            <div class="col">
                <div class="form-group mb-4">
                    <label for="width">Широчина (см):</label>
                    <input type="number" class="form-control" id="width" name="width" required oninvalid="this.setCustomValidity('Трябва да въведете широчина')" oninput="this.setCustomValidity('')">
                    <div id="widthError" class="error-message"></div>
                </div>
            </div>
            <div class="col">
                <div class="form-group mb-4">
                    <label for="height">Височина (см):</label>
                    <input type="number" class="form-control" id="height" name="height" required oninvalid="this.setCustomValidity('Трябва да въведете височина')" oninput="this.setCustomValidity('')">
                    <div id="heightError" class="error-message"></div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-dark">Добави</button>
    </form>
</div>
</body>

</html>