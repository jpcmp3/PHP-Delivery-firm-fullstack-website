<?php
$pageTitle = 'Управление на служители';

include_once 'header.php';
include_once 'includes/auth_check.php';
include_once 'includes/dbh.inc.php';
?>

<div class="container my-5">
    <h1 class="text-center my-3">Служители</h1>
    <hr>

    <a href="add_user.php" class="btn btn-dark text-light my-1" style="text-decoration: none">Добави служител</a>

    <table id="example" class="table shadow table-striped" style="width:100%">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Име</th>
                <th scope="col">Имейл</th>
                <th scope="col">Телефонен номер</th>
                <th scope="col">Потребителско име</th>
                <th scope="col">Дата на създаване</th>
                <th scope="col">Действия</th>
            </tr>
        </thead>
        <tbody class="table-light">

            <?php
            $sql = "SELECT * FROM users";
            $resultData = mysqli_query($conn, $sql);
            if ($resultData) {
                while ($row = mysqli_fetch_assoc($resultData)) {
                    $id = $row['usersId'];
                    $name = $row['usersName'];
                    $email = $row['usersEmail'];
                    $phoneNumber = $row['usersPhoneNumber'];
                    $username = $row['usersUid'];
                    $userCreatedDate = $row['userCreatedDate'];
                    echo '<tr>
            <th scope="row">' . $id . '</th>
            <td>' . $name . '</td>
            <td>' . $email . '</td>
            <td>' . $phoneNumber . '</td>
            <td>' . $username . '</td>
            <td>' . $userCreatedDate . '</td>
            <td>
              <a href="updateUser.php?updateid=' . $id . '" class="btn btn-primary text-light" style="text-decoration: none"><i class="fas fa-edit"></i></a>
              <button type="button" class="btn btn-danger delete-button" data-id="' . $id . '"><i class="fas fa-trash-alt"></i></button>
            </td>
          </tr>';
                }
            }
            ?>
            </tfoot>
    </table>
</div>
<script defer src="js/modal_user.js"></script>