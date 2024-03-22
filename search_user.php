<?php
$pageTitle = 'Потърси служител';
include_once 'header.php';
include_once 'includes/auth_check.php';
include_once 'includes/dbh.inc.php';
?>
<div class="container p-5">
     <h1 class="text-center">Потърси служител</h1>
  <hr>
  <div class="input-group justify-content-center pb-5">
    <form method="GET" class="input-group text-center" style="width: 30rem">
      <input name="search" type="search" class="form-control" placeholder="Пример: Иван Гергинов">
      <button class="btn btn-dark"> <i class="fas fa-search"></i> </button>
    </form>
  </div>



  <table class="table">
    <?php
    if (isset($_GET['search'])) {
      $search = $_GET['search'];
      $query = "SELECT * FROM users WHERE usersName='$search'";
      $result = mysqli_query($conn, $query);
      echo 'Резултати: ' . mysqli_num_rows($result);
      if ($result) {
        if (mysqli_num_rows($result) > 0) {
          echo '
          <table class="table shadow">
            <thead class="table-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Име</th>
                <th scope="col">Имейл</th>
                <th scope="col">Телефонен номер</th>
                <th scope="col">Потребителско име</th>
              </tr>
            </thead>
          <tbody class="table-light">';
          while ($row = mysqli_fetch_assoc($result)) {
            echo '
            <tr>
              <td>' . $row['usersId'] . '</td>
              <td>' . $row['usersName'] . '</td>
              <td>' . $row['usersEmail'] . '</td>
              <td>' . $row['usersPhoneNumber'] . '</td>
              <td>' . $row['usersUid'] . '</td>
            </tr>';
          };
        } else {
          echo '<h5 class="text-danger">Няма регистриран служител с такова име<h5>';
        }
      }
    }
    ?>
  </table>
</div>
</body>

</html>