<?php
$pageTitle = 'Табло за управление';
include_once 'header.php';
include_once 'includes/auth_check.php';
include_once 'includes/dbh.inc.php';
?>
<div class="container">
  <div class="ag-format-container">
    <div class="ag-courses_box">
      <div class="ag-courses_item">
        <a href="/users_list.php" class="ag-courses-item_link">
          <div class="ag-courses-item_bg"></div>

          <div class="ag-courses-item_title">
            Регистрирани служители
          </div>

          <div class="ag-courses-item_date-box">
            брой:
            <span class="ag-courses-item_date">
              <?php
              $sql = "SELECT * from users";
              $result = mysqli_query($conn, $sql);
              if ($userCount = mysqli_num_rows($result)) {
                echo $userCount;
              } else echo '0';
              ?>
            </span>
          </div>
        </a>
      </div>

      <div class="ag-courses_item">
        <a href="/active_shipments.php" class="ag-courses-item_link">
          <div class="ag-courses-item_bg"></div>

          <div class="ag-courses-item_title">
            Активни пратки
          </div>
          <div class="ag-courses-item_date-box">
            брой:
            <span class="ag-courses-item_date">
              <?php
              $sql = "SELECT sh.*
            FROM shipment_history sh
            JOIN (
                SELECT shipment_id, MAX(update_time) AS max_update_time
                FROM shipment_history
                GROUP BY shipment_id
            ) sh_max ON sh.shipment_id = sh_max.shipment_id 
            AND sh.update_time = sh_max.max_update_time
            WHERE sh.status = 'Регистрирана' 
            OR sh.status = 'Готова за предаване' 
            OR sh.status = 'На път'";
              $result = mysqli_query($conn, $sql);
              if ($activeCount = mysqli_num_rows($result)) {
                echo $activeCount;
              } else echo '0';
              ?>
            </span>
          </div>
        </a>
      </div>

      <div class="ag-courses_item">
        <a href="/inactive_shipments.php" class="ag-courses-item_link">
          <div class="ag-courses-item_bg"></div>

          <div class="ag-courses-item_title">
            Прикючени пратки
          </div>

          <div class="ag-courses-item_date-box">
            брой:
            <span class="ag-courses-item_date">
              <?php
              $sql = "SELECT sh.*
            FROM shipment_history sh
            JOIN (
                SELECT shipment_id, MAX(update_time) AS max_update_time
                FROM shipment_history
                GROUP BY shipment_id
            ) sh_max ON sh.shipment_id = sh_max.shipment_id AND sh.update_time = sh_max.max_update_time
            WHERE sh.status = 'Доставена' 
            OR sh.status = 'Провалена доставка'";
              $result = mysqli_query($conn, $sql);
              if ($inactiveCount = mysqli_num_rows($result)) {
                echo $inactiveCount;
              } else echo '0';
              ?>
            </span>
          </div>
        </a>
      </div>

      <div class="ag-courses_item">
        <a href="/registered_shipments.php" class="ag-courses-item_link">
          <div class="ag-courses-item_bg"></div>

          <div class="ag-courses-item_title">
            Регистрирани пратки
          </div>

          <div class="ag-courses-item_date-box">
            брой:
            <span class="ag-courses-item_date">
              <?php
              $sql = "SELECT sh.*
              FROM shipment_history sh
              JOIN (
                  SELECT shipment_id, MAX(update_time) AS max_update_time
                  FROM shipment_history
                  GROUP BY shipment_id
              ) sh_max ON sh.shipment_id = sh_max.shipment_id AND sh.update_time = sh_max.max_update_time
              WHERE sh.status = 'Регистрирана';";
              $result = mysqli_query($conn, $sql);
              if ($registeredShipmentsCount = mysqli_num_rows($result)) {
                echo $registeredShipmentsCount;
              } else echo '0';
              ?>
            </span>
          </div>
        </a>
      </div>

      <div class="ag-courses_item">
        <a href="/ready_for_pickup.php" class="ag-courses-item_link">
          <div class="ag-courses-item_bg"></div>

          <div class="ag-courses-item_title">
            Готови за предаване
          </div>
          <div class="ag-courses-item_date-box">
            брой:
            <span class="ag-courses-item_date">
              <?php
              $sql = "SELECT sh.*
              FROM shipment_history sh
              JOIN (
                  SELECT shipment_id, MAX(update_time) AS max_update_time
                  FROM shipment_history
                  GROUP BY shipment_id
              ) sh_max ON sh.shipment_id = sh_max.shipment_id AND sh.update_time = sh_max.max_update_time
              WHERE sh.status = 'Готова за предаване';";
              $result = mysqli_query($conn, $sql);
              if ($readyForPickupCount = mysqli_num_rows($result)) {
                echo $readyForPickupCount;
              } else echo '0';
              ?>
            </span>
          </div>
        </a>
      </div>

      <div class="ag-courses_item">
        <a href="/in_transit.php" class="ag-courses-item_link">
          <div class="ag-courses-item_bg"></div>

          <div class="ag-courses-item_title">
            На път
          </div>
          <div class="ag-courses-item_date-box">
            брой:
            <span class="ag-courses-item_date">
              <?php
              $sql = "SELECT sh.*
              FROM shipment_history sh
              JOIN (
                  SELECT shipment_id, MAX(update_time) AS max_update_time
                  FROM shipment_history
                  GROUP BY shipment_id
              ) sh_max ON sh.shipment_id = sh_max.shipment_id AND sh.update_time = sh_max.max_update_time
              WHERE sh.status = 'На път';";
              $result = mysqli_query($conn, $sql);
              if ($inTransitCount = mysqli_num_rows($result)) {
                echo $inTransitCount;
              } else echo '0';
              ?>
            </span>
          </div>
        </a>
      </div>

      <div class="ag-courses_item">
        <a href="/delivered.php" class="ag-courses-item_link">
          <div class="ag-courses-item_bg">
          </div>
          <div class="ag-courses-item_title">
            Доставени
          </div>

          <div class="ag-courses-item_date-box">
            брой:
            <span class="ag-courses-item_date">
              <?php
              $sql = "SELECT sh.*
              FROM shipment_history sh
              JOIN (
                  SELECT shipment_id, MAX(update_time) AS max_update_time
                  FROM shipment_history
                  GROUP BY shipment_id
              ) sh_max ON sh.shipment_id = sh_max.shipment_id AND sh.update_time = sh_max.max_update_time
              WHERE sh.status = 'Доставена';";
              $result = mysqli_query($conn, $sql);
              if ($deliveredCount = mysqli_num_rows($result)) {
                echo $deliveredCount;
              } else echo '0';
              ?>
            </span>
          </div>
        </a>
      </div>

      <div class="ag-courses_item">
        <a href="/failed_shipments.php" class="ag-courses-item_link">
          <div class="ag-courses-item_bg">
          </div>
          <div class="ag-courses-item_title">
            Неуспешно доставени
          </div>

          <div class="ag-courses-item_date-box">
            брой:
            <span class="ag-courses-item_date">
              <?php
              $sql = "SELECT sh.*
               FROM shipment_history sh
               JOIN (
                   SELECT shipment_id, MAX(update_time) AS max_update_time
                   FROM shipment_history
                   GROUP BY shipment_id
               ) sh_max ON sh.shipment_id = sh_max.shipment_id AND sh.update_time = sh_max.max_update_time
               WHERE sh.status = 'Провалена доставка';";
              $result = mysqli_query($conn, $sql);
              if ($failedCount = mysqli_num_rows($result)) {
                echo $failedCount;
              } else echo '0';
              ?>
            </span>
          </div>
        </a>
      </div>

      <div class="ag-courses_item">
        <a href="/last_updates.php" class="ag-courses-item_link">
          <div class="ag-courses-item_bg">
          </div>
          <div class="ag-courses-item_title">
            Последно обновяване
          </div>

          <div class="ag-courses-item_date-box">
            <span class="ag-courses-item_date">
              <?php
              $sql = "SELECT update_time FROM shipment_history ORDER BY history_table_id DESC LIMIT 1";
              $result = mysqli_query($conn, $sql);

              if ($updateTime = mysqli_num_rows($result)) {
                $row = mysqli_fetch_assoc($result);
                $dateUpdate = $row['update_time'];
                $parsedDate = date_parse_from_format("Y-m-d H:i:s", $dateUpdate);

                $monthNames = [
                  1 => 'Януари',
                  2 => 'Февруари',
                  3 => 'Март',
                  4 => 'Април',
                  5 => 'Май',
                  6 => 'Юни',
                  7 => 'Юли',
                  8 => 'Август',
                  9 => 'Септември',
                  10 => 'Октомври',
                  11 => 'Ноември',
                  12 => 'Декември'
                ];

                $month = $monthNames[$parsedDate['month']];
                $day = $parsedDate['day'];
                $hour = $parsedDate['hour'];
                $minutes = sprintf("%02d", $parsedDate['minute']);

                echo "$month $day, $hour:$minutes";
              } else {
                echo "Засега няма";
              }
              ?>
            </span>
          </div>

        </a>
      </div>
      <link rel="stylesheet" href="css/styles.css">
      </body>

      </html>