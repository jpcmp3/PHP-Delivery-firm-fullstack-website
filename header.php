<?php
session_start();
function getStatusBadgeColor($status) {
    switch ($status) {
        case "Доставена":
            $color = "green";
            break;
        case "Провалена доставка":
            $color = "red";
            break;
        case "На път":
            $color = "yellow";
            $textColor = "brown";
            break;
        case "Готова за предаване":
            $color = "blue";
            break;
        default:
            $color = "gray";
            break;
    }
    return array($color, $textColor);
}
?>
<!DOCTYPE html>
<html lang="bg">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script defer src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
  <script defer src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
  <script defer src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <script defer src="https://cdn.datatables.net/buttons/2.4.0/js/dataTables.buttons.min.js"></script>
  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script defer src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script defer src="https://cdn.datatables.net/buttons/2.4.0/js/buttons.html5.min.js"></script>
  <script defer src="https://cdn.datatables.net/buttons/2.4.0/js/buttons.print.min.js"></script>


  <script defer src="js/script.js"></script>

  <title><?php echo $pageTitle; ?></title>
</head>

<body style="background-color: #f0f0f0" class="pb-5">
  <nav class="navbar navbar-expand navbar-dark bg-dark">
    <div class="container">
      <?php if (isset($_SESSION["useruid"])) : ?>
        <a class="navbar-brand" href="index.php">Доставки ООД</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="Dashboard.php">Табло за управление</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink1" role="button" data-bs-toggle="dropdown" aria-expanded="false">Служители</a>
              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink1">
                <li><a class="dropdown-item" href="users_list.php">Виж списък</a></li>
                <li><a class="dropdown-item" href="add_user.php">Добави нов</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink2" role="button" data-bs-toggle="dropdown" aria-expanded="false">Пратки</a>
              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink2">
                <li><a class="dropdown-item" href="add_shipment.php">Добави нова пратка</a></li>
                <li><a class="dropdown-item" href="shipment_list.php">Списък с всички</a></li>
                <li><a class="dropdown-item" href="active_shipments.php">Активни</a></li>
                <li><a class="dropdown-item" href="inactive_shipments.php">Приключени</a></li>
                <li><a class="dropdown-item" href="registered_shipments.php">Регистрирани</a></li>
                <li><a class="dropdown-item" href="ready_for_pickup.php">Готови за предаване</a></li>
                <li><a class="dropdown-item" href="in_transit.php">Ha път</a></li>
                <li><a class="dropdown-item" href="delivered.php">Успешно доставени</a></li>
                <li><a class="dropdown-item" href="failed_shipments.php">Неуспешно доставени</a></li>
                <li><a class="dropdown-item" href="last_updates.php">Последни обновявания</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink3" role="button" data-bs-toggle="dropdown" aria-expanded="false">Търсене</a>
              <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink3">
                <li><a class="dropdown-item" href="search_shipment.php">Проследи пратка</a></li>
                <li><a class="dropdown-item" href="search_user.php">Потърси служител</a></li>
                 <li><a class="dropdown-item" href="search_sender.php">Потърси клиент/подател</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="calculator.php">Калкулатор</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="includes/logout.inc.php">Изход</a>
            </li>

          </ul>
        </div>
        <div class="navbar-text">
          <i class="fa-solid fa-user mx-2">
            <a href="profile.php" class="text-decoration-none"></i>
                <?= $_SESSION["useruid"] ?>
            </a>

        </div>
      <?php else : ?>
        <a class="navbar-brand" href="index.php">Доставки ООД</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="login.php">Влез</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="search_shipment.php">Проследи пратка</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="calculator.php">Калкулатор</a>
            </li>
          </ul>
        </div>
      <?php endif; ?>
    </div>
  </nav>