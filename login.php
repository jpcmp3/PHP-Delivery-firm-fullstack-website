<?php
$pageTitle = 'Влез';
include_once 'header.php';
?>
<?php


//Error messages upon signing up
if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
        echo '<div class="alert alert-success px-5">Попълнете всички полета, моля</div>';
    } else if ($_GET["error"] == "wronglogin") {
        echo '<div class="alert alert-success px-5">Неправилни данни за логин</div>';
    }
}
?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="includes/login.inc.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">Потребителско име или имейл</label>
                    <input name="uid" type="text" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Парола</label>
                    <input name="pwd" type="password" class="form-control">
                </div>
                <button name="submit" type="submit" class="btn btn-dark">Влез</button>
            </form>
        </div>
    </div>
</div>


</body>

</html>