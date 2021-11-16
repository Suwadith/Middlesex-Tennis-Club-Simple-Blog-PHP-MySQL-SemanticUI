<?php

require_once("../controllers/server_config.php");
session_start();

if(session_destroy()) {
    header("Location: ../pages/login.php");
}

?>
