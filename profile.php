<?php
$pageTitle = 'Профил';
include_once 'header.php';
include_once 'includes/auth_check.php';
include_once 'includes/dbh.inc.php';
?>


<div class="container my-5">
    <h1 class="text-center my-3">Профил</h1>
    <hr>

    <?php
    $id = $_SESSION["userid"];

    $sql = "SELECT * FROM users WHERE usersId = '$id'";
    $resultData = mysqli_query($conn, $sql);

    if ($resultData && mysqli_num_rows($resultData) > 0) {
        $row = mysqli_fetch_assoc($resultData);
        $name = $row['usersName'];
        $email = $row['usersEmail'];
        $phoneNumber = $row['usersPhoneNumber'];
        $username = $row['usersUid'];
        $userCreatedDate = $row['userCreatedDate'];
        echo '
        <a href="updateUser.php?updateid=' . $id . '" class="btn btn-primary text-light" style="text-decoration: none"><i class="fas fa-edit"></i></a>';
    }

    echo '<div class="my-3"><h5>
        ИД на акаунт: ' . $id . '<br>
        Имена: ' . $name . '<br>
        Имейл: ' . $email . '<br>
        Телефонен номер: ' . $phoneNumber . '<br>
        Потребителско име: ' . $username . '<br>
        Дата на създаване: ' . $userCreatedDate . '</div>';
    ?>

    </tfoot>
    </table>
</div>