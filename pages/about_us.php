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

        .center-image {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 40%;
            padding-bottom: 20px;
        }

    </style>
</head>
<body>

<h1 class="ui center aligned header" style="padding-top: 20px; padding-bottom: 50px">Middlesex Tennis Club</h1>

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

<p style="text-align: center"><b>This is a sample website built for our cyber security coursework.</b></p>
<p style="text-align: center"><b>We can post encryption related hints over here.</b></p>

<h2 class="ui header center aligned">Group members</h2>
<br>
<p style="text-align: center"><b>Arjun Trivedi</b></p>
<p style="text-align: center"><b>Sneha Sebastian</b></p>
<p style="text-align: center"><b>Suwadith</b></p>
<p style="text-align: center"><b>Waleed</b></p>

</body>
