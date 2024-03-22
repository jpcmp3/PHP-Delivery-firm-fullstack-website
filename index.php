<?php
$pageTitle = 'Начало';
include_once 'header.php';


if (isset($_SESSION['success_message'])) {
  // Display the success message
  echo '<div class="alert alert-success px-5">' . $_SESSION['success_message'] . '</div>';
  
  // Unset the session variable to clear the message
  unset($_SESSION['success_message']);
}
?>


<div class="container my-5"><h1 class="text-center">
    
<?php
// Check if a success message is set in the session

if (!isset($_SESSION["useruid"])) {
  
  echo 'Добре дошли в Доставки ООД';
} else echo 'Здравей, ' . $_SESSION["useruid"];
?>


</h1><div>
</body>

</html>