<?php
//Sign up functions
function emptyInputSignup($name, $email, $phonenumber, $username, $pwd, $pwdrepeat)
{
    $result = null;
    //checks for empty fields in the signup form
    if (empty($name) || empty($email) || empty($phonenumber) || empty($username) || empty($pwd) || empty($pwdrepeat)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidUid($username)
{
    $result = null;
    //Regular expression for allowed characters in username
    if (!preg_match("#^[a-zA-Z0-9]*$#", $username)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

function invalidEmail($email)
{
    $result = null;

    //checks if email is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdrepeat)
{
    $result = null;

    //checks if passwords fields in the form match
    if ($pwd !== $pwdrepeat) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function uidExists($conn, $username, $email)
{
    //checks if username is taken

    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);

    //check for error with inserting sql into DB
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../add_user.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    //if database returns any data = true
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

//Insert user data taken from the form into the database
function createUser($conn, $name, $email, $phonenumber, $username, $pwd)
{

    $sql = "INSERT INTO users (usersName, usersEmail, usersPhoneNUmber, usersUid, usersPwd) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    //check for error with inserting sql into DB
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../add_user.php?error=stmtfailed");
        exit();
    }

    //Password hashing for extra security

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    //bind to the DB
    //5x string = sssss
    mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $phonenumber, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../add_user.php?error=none");
    exit();
}

//Login functions
function emptyInputLogin($username, $pwd)
{
    $result = null;
    //checks for empty fields in the add_user form
    if (empty($username) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $pwd)
{
    $uidExists =  uidExists($conn, $username, $username);

    if ($uidExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    //Takes the hashed usersPwd password from the DB and saves it in $pwdHashed
    $pwdHashed = $uidExists["usersPwd"];


    //Checks if login password and DB password match
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        //wrong pass, redirect user to login with error messave
        header("location: ../login.php?error=wronglogin");
        exit();
    } else if ($checkPwd === true) {
        //if password is right, start a session
        session_start();
        //grab user id
        $_SESSION["userid"] = $uidExists["usersId"];
        //grab username
        $_SESSION["useruid"] = $uidExists["usersUid"];



        
        $_SESSION['success_message'] = "Успешен логин";
        header("Location: ../index.php");
        exit();
    }
}
