<?php

require_once("../controllers/server_config.php");
session_start();

$sql_search = "SELECT * FROM `quiz`";
$search_result = mysqli_query($db_con, $sql_search);

$result_row = mysqli_fetch_assoc($search_result);
echo "<b>" . $result_row['quiz_content'] . "</b>";

?>
