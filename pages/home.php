<?php

require_once("../controllers/server_config.php");
session_start();

//if (isset($_SESSION['username'])) {
//    header("Location: ../pages/home.php");
//}
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

</body>
