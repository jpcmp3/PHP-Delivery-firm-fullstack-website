<?php
$pageTitle = 'Потърси клиент';
include_once 'header.php';
include_once 'includes/auth_check.php';
include_once 'includes/dbh.inc.php';
?>

<div class="container p-5">
    <h1 class="text-center">Потърси клиент</h1>
  <hr>
  <div class="input-group justify-content-center pb-5 my-4">
    <form method="GET" class="input-group" style="width: 30rem">
      <input name="search" type="search" class="form-control" placeholder="Пример: Димитър Петров">
      <button class="btn btn-dark"> <i class="fas fa-search"></i> </button>
    </form>
  </div>


  <table class="table">
    <?php
    if (isset($_GET['search'])) {
      $search = $_GET['search'];
       $query = "SELECT s.sender_name, h.tracking_id, h.update_time, h.status
                FROM shipment s
                INNER JOIN (
                  SELECT shipment_id, tracking_id, update_time, status
                  FROM shipment_history
                  WHERE (shipment_id, update_time) IN (
                    SELECT shipment_id, MAX(update_time)
                    FROM shipment_history
                    GROUP BY shipment_id
                  )
                ) h ON s.shipment_id = h.shipment_id
                WHERE s.sender_name = '$search'";
      $result = mysqli_query($conn, $query);
      if ($result) {
        if (mysqli_num_rows($result) > 0) {
          echo '
          <table class="table shadow">
            <thead class="table-dark">
              <tr>
                <th scope="col">Име на подател</th>
                <th scope="col">Време на обновяване</th>
                <th scope="col">Статус</th>
                <th scope="col">ИД за проследяване</th>
              </tr>
            </thead>
          <tbody class="table-light">';
         while ($row = mysqli_fetch_assoc($result)) {
                $status = $row['status'];
        list($badgeColor, $textColor) = getStatusBadgeColor($status);
            echo '
            <tr>
              <td>' . $row['sender_name'] . '</td>
              <td>' . $row['update_time'] . '</td>
               <td><h5 class="badge" style="background-color:' . $badgeColor . '; color:' . $textColor . ';">' . $status . '</h5></td>
              <td>' . $row['tracking_id'] . '</td>
            </tr>';
          };
        } else {
          echo '<h5 class="text-danger">Няма подател с такова име.<h5>';
        }
      }
    }
    ?>

  </table>
</div>


</body>

</html>