<?php
$pageTitle = 'Редактирай данни за служител';
include_once 'header.php';
include_once 'includes/updateUser.inc.php';

?>

<div class="container my-5">
    <form method="POST">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Име</label>
                    <input value="<?php echo $name; ?>" name="name" type="text" class="form-control" placeholder="Въведете име">
                </div>

                <div class="mb-3">
                    <label class="form-label">Имейл</label>
                    <input value="<?php echo $email; ?>" name="email" type="email" class="form-control" placeholder="Въведете email">
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Телефонен номер</label>
                    <input value="<?php echo $phonenumber; ?>" name="phonenumber" type="text" class="form-control" placeholder="Въведете номер">
                </div>

                <div class="mb-3">
                    <label class="form-label">Потребителско име</label>
                    <input value="<?php echo $username; ?>" name="uid" type="text" class="form-control" placeholder="Въведете номер">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button name="submit" type="submit" class="btn btn-dark">Запази</button>
            </div>
        </div>

    </form>
</div>


</body>

</html>