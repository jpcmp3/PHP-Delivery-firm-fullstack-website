<?php
$pageTitle = 'Калкулатор';
include_once 'header.php';
include_once 'includes/dbh.inc.php';
include_once 'includes/calculatePrice.inc.php';
?>

<div class="container my-5">
    <h1 class="text-center my-3">Изчисли цена</h1>
    <hr>
    <form method="POST" action="" onsubmit="return validateForm()">
        <div class="row">
            <div class="col">
                <div class="form-group my-3">
                    <label for="weight">Тегло (в кг.):</label>
                    <input type="number" class="form-control" id="weight" name="weight" step="0.1">
                    <div id="weightError" class="error-message"></div>
                </div>
            </div>
            <div class="col">
                <div class="form-group my-3">
                    <label for="length">Дължина (см):</label>
                    <input type="number" class="form-control" id="length" name="length">
                    <div id="lengthError" class="error-message"></div>
                </div>
            </div>
            <div class="col">
                <div class="form-group my-3">
                    <label for="width">Широчина (см):</label>
                    <input type="number" class="form-control" id="width" name="width">
                    <div id="widthError" class="error-message"></div>
                </div>
            </div>
            <div class="col">
                <div class="form-group my-3">
                    <label for="height">Височина (см):</label>
                    <input type="number" class="form-control" id="height" name="height">
                    <div id="heightError" class="error-message"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col text-end">
                <button type="submit" class="btn btn-dark mt-3">Изчисли</button>
            </div>
        </div>
    </form>


    <script defer src="js/calculator.js"></script>
    <?php
    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve the input values
        $weight = $_POST['weight'];
        $length = $_POST['length'];
        $width = $_POST['width'];
        $height = $_POST['height'];

        // Call the calculateDeliveryPrice function
        $price = calculateDeliveryPrice($weight, $length, $width, $height);

        // Display the calculated price
        echo '<div class="mt-4">';
        echo 'Цена на доставка: ' . $price . ' лв.';
    }
    ?>
</div>
</body>

</html>