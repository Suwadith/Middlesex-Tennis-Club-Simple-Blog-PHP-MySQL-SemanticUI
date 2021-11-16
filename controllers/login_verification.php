<?php

require_once("../controllers/server_config.php");
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql_search = "SELECT * FROM `user` WHERE `username`='$username'";
    $search_result = mysqli_query($db_con, $sql_search);

    $result = mysqli_num_rows($search_result);

    if ($result != 0) {
        $result_row = mysqli_fetch_assoc($search_result);
        $password_check = password_verify($password, $result_row['password']);

        if ($password_check) {
            $_SESSION['firstname'] = $result_row['firstname'];
            $_SESSION['lastname'] = $result_row['lastname'];
            $_SESSION['email'] = $result_row['email'];
            $_SESSION['username'] = $result_row['username'];

            header("Location: ../pages/home.php");
        } else {

            $_SESSION["incorrect_password"] = true;
            $_SESSION["error_message"] = "Incorrect Password. Try Again.";

            header("Location: ../pages/login.php");
        }
    } else {
        $_SESSION["incorrect_username"] = true;
        $_SESSION["error_message"] = "Username not found. Try Again.";

        header("Location: ../pages/login.php");
    }

}

?>