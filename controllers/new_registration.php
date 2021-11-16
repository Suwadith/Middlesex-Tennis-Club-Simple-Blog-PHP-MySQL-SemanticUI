<?php

require_once("../controllers/server_config.php");
session_start();

if(isset($_POST['firstname']) && isset($_POST['lastname'])
    && isset($_POST['email']) && isset($_POST['username'])
    && isset($_POST['password'])) {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

//    echo $username;

    $sql_search = "SELECT * FROM `user` WHERE `username`='$username' OR `email`='$email'";
    $search_result = mysqli_query($db_con, $sql_search);
    if(mysqli_num_rows($search_result) == 0) {
        $sql_insert = "INSERT INTO `user` (`firstname`, `lastname`, `email`, `username`, `password`) 
                    VALUES ('$firstname', '$lastname', '$email', '$username', '$password')";

        $insert_result = mysqli_query($db_con, $sql_insert);
        if($insert_result) {
            $_SESSION["success"] = true;
        } else {
            $_SESSION["error_message"] = "An error has occurred.";
        }
    } else {
        $_SESSION["account_found"] = "Username/Email already in use. Please use another one.";
    }

    header("Location: ../pages/registration.php");


}

//$sql = "SELECT * FROM players";
//$result = mysqli_query($db_con, $sql);

//if(mysqli_num_rows($result)>0) {
//    fetc
//}

//while($row = mysqli_fetch_array($result)) {
//    echo $row['player_name'];
//}

?>