<?php

//destroy session
session_start();
session_unset();
session_destroy();

//sending the user to the logged out page
header("location: ../loggedout.php");
exit();