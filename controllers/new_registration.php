<?php

require_once("../controllers/server_config.php");
session_start();

if(isset($_POST['firstname']) && isset($_POST['lastname'])
    && isset($_POST['dob']) && isset($_POST['address'])
    && isset($_POST['email']) && isset($_POST['username'])
    && isset($_POST['password'])) {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $dob = date("Y-m-d H:i:s",strtotime($_POST['dob']));
    $address = $_POST['address'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    echo $dob;

    $sql_search = "SELECT * FROM `user` WHERE `username`='$username' OR `email`='$email'";
    $search_result = mysqli_query($db_con, $sql_search);
    if(mysqli_num_rows($search_result) == 0) {
        $sql_insert = "INSERT INTO `user` (`firstname`, `lastname`, `dob`, `address`, `email`, `username`, `password`) 
                    VALUES ('$firstname', '$lastname', '$dob', '$address', '$email', '$username', '$hashed_password')";

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