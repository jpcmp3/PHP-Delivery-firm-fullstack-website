<?php
$pageTitle = 'Пратката бе добавена успешно';
include_once 'header.php';
include_once 'includes/auth_check.php';
?>
<div class="container my-5">

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </symbol>
    </svg>
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="29" height="24" role="img" aria-label="Success:">
            <use xlink:href="#check-circle-fill" />
        </svg>
        <div>
            Пратката бе добавена успешно.
        </div>
    </div>
    <button type="button" class="btn btn-success py-3"><i class="fa fa-arrow-left" aria-hidden="true"></i>
        <a href="last_updates.php" style="color: #f0f0f0; text-decoration: none">Към последни обновявания</a></button>
</div