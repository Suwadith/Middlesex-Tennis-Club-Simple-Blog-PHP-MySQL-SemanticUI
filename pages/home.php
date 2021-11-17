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

<img class="center-image"
     src="https://tigerturf.com/in/wp-content/uploads/2019/11/How-to-build-a-tennis-court-1440x1080.jpg">

<p style="text-align: center"><b>A very warm welcome to Middlesex Tennis Club, founded on the 17th of November 2021.</b></p>
<p style="text-align: center"><b>We are the second oldest Tennis Club in London, preceded only by Wimbledon.</b></p>
<p style="text-align: center"><b>Our most famous club players can be seen under the Players section and by choosing any one of them, the registered users will have have the opportunity to make comments.</b></p>

</body>
