<?php

$db_con = mysqli_connect("localhost", "root", "", "cybersec");

if(!$db_con) {
    die('DB Connection Failed: ' . mysqli_connect_error());
}

?>