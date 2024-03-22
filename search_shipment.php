<?php
$pageTitle = 'Проследи пратка';
include_once 'header.php';
include_once 'includes/dbh.inc.php';
?>

<div class="container p-5">
    <h1 class="text-center">Проследи пратка</h1>
  <hr>
  <div class="input-group justify-content-center pb-5 my-4">
    <form method="GET" class="input-group" style="width: 30rem">
      <input name="search" type="search" class="form-control" placeholder="Пример: E1OQ3K1V0G">
      <button class="btn btn-dark"> <i class="fas fa-search"></i> </button>
    </form>
  </div>



  <table class="table">
    <?php
    if (isset($_GET['search'])) {
      $search = $_GET['search'];
      $query = "SELECT * FROM shipment_history WHERE tracking_id='$search'";
      $result = mysqli_query($conn, $query);
      if ($result) {
        if (mysqli_num_rows($result) > 0) {
          echo '
          <table class="table shadow">
            <thead class="table-dark">
              <tr>
                <th scope="col">Време на обновяване</th>
                <th scope="col">Местоположение</th>
                <th scope="col">Статус</th>
              </tr>
            </thead>
          <tbody class="table-light">';
         while ($row = mysqli_fetch_assoc($result)) {
        $status = $row['status'];
        list($badgeColor, $textColor) = getStatusBadgeColor($status);
        echo '
        <tr>
          <td>' . $row['update_time'] . '</td>
          <td>' . $row['location'] . '</td>
          <td><h5 class="badge" style="background-color:' . $badgeColor . '; color:' . $textColor . ';">' . $status . '</h5></td>
        </tr>';
      
          };
        } else {
          echo '<h5 class="text-danger">Няма пратка с такъв код<h5>';
        }
      }
    }
    ?>

  </table>
</div>


</body>

</html>