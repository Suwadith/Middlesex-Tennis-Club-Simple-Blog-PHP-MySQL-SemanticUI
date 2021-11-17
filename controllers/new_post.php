<?php

require_once("../controllers/server_config.php");
session_start();

if(isset($_SESSION['user_id']) && isset($_SESSION['username']) && isset($_POST['post']) && isset($_POST['player'])) {

    $post = $_POST['post'];
    $player_id = $_POST['player'];
    $user_id = $_SESSION['user_id'];
    $username = $_SESSION['username'];

    $sql_insert = "INSERT INTO `post` (`user_id`, `player_id`, `comment`, `username`) 
                    VALUES ('$user_id', '$player_id', '$post', '$username')";

    $insert_result = mysqli_query($db_con, $sql_insert);

    header("Location: ../pages/player.php?player=$player_id");

} else {
    header("Location: ../pages/login.php");
}