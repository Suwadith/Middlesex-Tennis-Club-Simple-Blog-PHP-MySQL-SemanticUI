<?php

require_once("../controllers/server_config.php");
session_start();

?>

<head>
    <link rel="stylesheet" type="text/css" href="../assets/semantic/semantic.css">
    <script
            src="../assets/js/jquery-3.1.1.min.js"></script>
    <script src="../assets/semantic/semantic.js"></script>


    <style type="text/css">
        body {
            background-color: #DADADA;
        }

        body {
            margin-top: 2%;
            margin-left: 5%;
            margin-right: 5%;
        }

        .menu {
            margin-top: 0;
        }

    </style>
</head>
<body>

<?php
if (isset($_SESSION['username'])) { ?>
    <div class="ui fluid five item menu">
        <a class="item"><?php echo "Hi, " . $_SESSION['username'] . "!" ?></a>
        <a class="item" href="home.php">Home</a>
        <a class="item" href="players.php">Players</a>
        <a class="item" href="about_us.php">About Us</a>
        <a class="item" href="../controllers/logout.php">Logout</a>
    </div>
    <?php
} else { ?>
    <div class="ui fluid four item menu">
        <a class="item" href="home.php">Home</a>
        <a class="item" href="players.php">Players</a>
        <a class="item" href="about_us.php">About Us</a>
        <a class="item" href="login.php">Log-in/Sign-up</a>
    </div>
<?php }
?>

<?php

$sql_player_search = "SELECT * FROM `players`";
$search_result = mysqli_query($db_con, $sql_player_search);;
//
//$result = mysqli_num_rows($search_result);

?>
<div class="ui four column grid">
    <?php
    while($row = mysqli_fetch_array($search_result)) {?>
    <div class="column">
        <div class="ui segment">
            <div class="ui centered card" onclick="location.href='player.php?player=<?php echo $row['player_id'] ?>'">
                <div class="image">
                    <img src="<?php echo $row['player_picture'] ?>">
                </div>
                <div class="content">
                    <a class="header"><?php echo $row['player_name'] ?></a>
                    <div class="meta">
                        <span class="date"><?php echo $row['player_age'] ?></span>
                    </div>
                    <div class="description">
                        <?php echo $row['player_country'] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <?php


    }

    ?>
</div>


</body>
