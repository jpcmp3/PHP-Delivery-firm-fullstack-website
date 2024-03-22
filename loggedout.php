
<!DOCTYPE html>
<html lang="bg">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


  <title>Изход</title>
</head>
<body style="background-color: #f0f0f0" class="pb-5">
  <nav class="navbar navbar-expand navbar-dark bg-dark">
    <div class="container">
      <?php if (isset($_SESSION["useruid"])) : ?>
        <a class="navbar-brand" href="index.php">Доставки ООД</a>

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
      Успешно излязохте от профила си.
    </div>
  </div>
  <button type="button" class="btn btn-success py-3"><i class="fa fa-arrow-left" aria-hidden="true"></i>
    <a href="login.php" style="color: #f0f0f0; text-decoration: none">Обратно към логин страницата</a></button>
</div>

</body>

</html>