<?php

//Checks if the user submitted their information through the submit form
if (isset($_POST["submit"])) {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $phonenumber = $_POST["phonenumber"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdrepeat = $_POST["pwdrepeat"];

    //include the DB handler and error checking fucntions file
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';


    // checks if there's empty fields. If yes, redirect and show error in URL
    if (emptyInputSignup($name, $email, $phonenumber, $username, $pwd, $pwdrepeat) !== false) {
        header("location: ../add_user.php?error=emptyinput");
        exit();
    }

    //checks if the username is valid
    if (invalidUid($username) !== false) {
        header("location: ../add_user.php?error=invaliduid");
        exit();
    }

    //checks if the email is valid
    if (invalidEmail($email) !== false) {
        header("location: ../add_user.php?error=invalidemail");
        exit();
    }

    //checks if the repeated passwords match
    if (pwdMatch($pwd, $pwdrepeat) !== false) {
        header("location: ../add_user.php?error=passwordsdontmatch");
        exit();
    }

    //checks if the username is already taken
    if (uidExists($conn, $username, $email) !== false) {

        header("location: ../add_user.php?error=usernameistaken");
        exit();
    }


    //TODO
    //checks if phone number is long enough
    //checks if password is long enough


    //If you reached here, there were no errors in the Sign up. Create the account
    createUser($conn, $name, $email, $phonenumber, $username, $pwd);
}

//if user came through a different place than the submit form, redirect to add_user page
else {
    header("location: ../add_user.php");
    exit();
}
