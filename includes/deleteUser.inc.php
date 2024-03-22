<?php
    include_once 'dbh.inc.php';
    

    if (isset($_GET['deleteid'])){
        $id=$_GET['deleteid'];
    
        $sql = "DELETE FROM users WHERE usersId=$id";
        $result = mysqli_query($conn, $sql);
        if($result){
            header('Location: https://courierwebsite.000webhostapp.com/users_list.php');
            exit();
        } else {
            die(mysqli_error($conn));
        }
    }
