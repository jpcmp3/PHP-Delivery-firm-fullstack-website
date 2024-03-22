<?php
$pageTitle = 'Активни доставки';
include_once 'header.php';
include_once 'includes/auth_check.php';
include_once 'includes/dbh.inc.php';
?>

<div class="container my-5">
  <h1 class="text-center my-3">Активни доставки</h1>
  <hr>
  <table id="example" class="table shadow table-striped">
    <thead class="table-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">ID за проследяване</th>
        <th scope="col">Местоположение</th>
        <th scope="col">Статус</th>
        <th scope="col">Време на обновяване</th>
        <th scope="col">Действия</th>
      </tr>
    </thead>
    <tbody class="table-light">
      <?php
      $sql = "SELECT sh.*
      FROM shipment_history sh
      JOIN (
          SELECT shipment_id, MAX(update_time) AS max_update_time
          FROM shipment_history
          GROUP BY shipment_id
      ) sh_max ON sh.shipment_id = sh_max.shipment_id AND sh.update_time = sh_max.max_update_time
      WHERE sh.status = 'Регистрирана' 
      OR sh.status = 'Готова за предаване' 
      OR sh.status = 'На път';";
      $result = mysqli_query($conn, $sql);

      if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
          $shipment_id = $row['shipment_id'];
          $tracking_id = $row['tracking_id'];
          $location = $row['location'];
          $status = $row['status'];
          $update_time = $row['update_time'];
        list($badgeColor, $textColor) = getStatusBadgeColor($status);

          echo '<tr>
                  <td>' . $shipment_id . '</td>
                  <td>' . $tracking_id . '</td>
                  <td>' . $location . '</td>
                  
                  
                  
                <td><h5 class="badge" style="background-color:' . $badgeColor . '; color:' . $textColor . ';">' . $status . '</h5></td>
                  
                  
                  
                  
                  
                  <td>' . $update_time . '</td>
                  <td>
                  <a href="info_shipment.php?infoid=' . $shipment_id . '" class="btn btn-info text-light" style="text-decoration: none"><i class="fa fa-info-circle"></i></a>
                  <a href="update_shipment.php?updateid=' . $shipment_id . '" class="btn btn-primary text-light" style="text-decoration: none"><i class="fas fa-edit"></i></a>
                  <button type="button" class="btn btn-danger delete-button" 
                  data-id="' . $shipment_id . '"><i class="fas fa-trash-alt"></i></button>
                 </td>
                </tr>';
        }
      }
      ?>
    </tbody>
  </table>
</div>
<script defer src="js/modal_shipment.js"></script>
