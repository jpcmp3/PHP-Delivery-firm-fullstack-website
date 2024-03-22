<?php
$pageTitle = 'Обнови статус на пратка';
include_once 'header.php';
include_once 'includes/updateShipment.inc.php';
include_once 'includes/auth_check.php';
?>

<div class="container my-5">
    <form method="POST">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Местоположение</label>
                    <input value="<?php echo $location; ?>" name="location" type="text" class="form-control"">
                </div>

                <div class=" mb-3">
                    <label class="form-label">Статус</label>
                    <select class="form-control" id="status" name="status">
                        <?php
                        $options = [
                            'Регистрирана',
                            'Готова за предаване',
                            'На път',
                            'Доставена',
                            'Провалена доставка'
                        ];
                        foreach ($options as $option) {
                            $selected = ($status === $option) ? 'selected' : '';
                            echo "<option value=\"$option\" $selected>$option</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class=" row">
                    <div class="col">
                        <button name="submit" type="submit" class="btn btn-dark">Обнови</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


</body>

</html>