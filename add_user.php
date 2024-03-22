<?php
$pageTitle = 'Добави служител';
include_once 'header.php';
include_once 'includes/auth_check.php';
include_once 'includes/dbh.inc.php';

//Server side error handling
if (isset($_GET["error"])) {
    switch ($_GET["error"]) {
        case "emptyinput":
            echo '<div class="alert alert-danger px-5" role="alert">
            Попълнете всички полета, моля.</div>';
            break;
        case "invaliduid":
            echo '<div class="alert alert-danger px-5" role="alert">
            Моля, използвайте само малки и големи букви и числа от 1 до 9.</div>';
            break;
        case "invalidemail":
            echo '<div class="alert alert-danger px-5" role="alert">
            Имейлът е невалиден.</div>';
            break;
        case "passwordsdontmatch":
            echo '<div class="alert alert-danger px-5" role="alert">
            Паролите не съвпадат.</div>';
            break;
        case "stmtfailed":
            echo '<div class="alert alert-danger px-5" role="alert">
            Грешка в системата. </div>';
            break;
        case "usernameistaken":
            echo '<div class="alert alert-danger px-5" role="alert">
            Потребителското име е заето. </div>';
            break;
        case "none":
            // If everything goes right
            echo '<div class="container my-3">
        
                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
          </symbol>
        </svg>
                <div class="alert alert-success d-flex align-items-center" role="alert">
              <svg class="bi flex-shrink-0 me-2" width="29" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
              <div>
              Акаунтът бе създаден успешно
              </div>
            </div>
                <button type="button" class="btn btn-success py-3"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                <a href="users_list.php" style="color: #f0f0f0; text-decoration: none">Обратно към списъка със служители</a></button>
            </div>';
            break;
        default:
            // Handle unknown error
            echo '<div class="alert alert-danger px-5" role="alert">
            Неизвестна грешка. </div>';
            break;
    }
}

?>
<!-- Front-end error handling -->
<script defer src="js/add_user_err_hdl.js"></script>


<div class="container my-5">
    <h1 class="text-center"> Добави служител</h1>
    <hr>
    <form action="includes/signup.inc.php" method="POST">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Имена</label>
                    <input name="name" type="text" class="form-control" placeholder="Въведете имена" required oninvalid="this.setCustomValidity('Трябва да въведете имена')" oninput="this.setCustomValidity('')">
                </div>

                <div class="mb-3">
                    <label class="form-label">Имейл</label>
                    <input name="email" type="email" class="form-control" placeholder="Въведете email" required oninvalid="this.setCustomValidity('Въведете имейл')" oninput="checkEmailValidity(this)">
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Телефонен номер</label>
                    <input name="phonenumber" type="text" class="form-control" placeholder="Въведете номер" required oninvalid="this.setCustomValidity('Трябва да въведете номер за връзка')" oninput="this.setCustomValidity('')">
                </div>

                <div class="mb-3">
                    <label class="form-label">Потребителско име</label>
                    <input name="uid" type="text" class="form-control" placeholder="Въведете потребителско име" required oninvalid="this.setCustomValidity('Трябва да въведете потребителско име')" oninput="this.setCustomValidity('')">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Парола</label>
                    <input autocomplete="new-password" name="pwd" type="password" class="form-control" placeholder="Въведете парола" required oninvalid="checkPasswordValidity(this)" oninput="this.setCustomValidity('')">
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Повторете паролата</label>
                    <input name="pwdrepeat" type="password" class="form-control" placeholder="Повторете парола" required oninvalid="checkPasswordMatch()" oninput="checkPasswordMatch()">
                </div>
            </div>
        </div>

        <div class="text-end">
            <button name="submit" type="submit" class="btn btn-dark">Създай акаунт</button>
        </div>
    </form>
</div>