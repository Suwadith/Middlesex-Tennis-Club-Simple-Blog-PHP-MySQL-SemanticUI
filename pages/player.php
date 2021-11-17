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

        .ui.comments .comment img.avatar, .ui.comments .comment .avatar img {
            height: 35px;
        }

        .comments {
            padding-bottom: 20px;
        }

    </style>
    <script>
        $(document)
            .ready(function () {
                $('.ui.form')
                    .form({
                        fields: {
                            firstname: {
                                identifier: 'firstname',
                                rules: [
                                    {
                                        type: 'empty',
                                        prompt: 'Please enter your first name'
                                    }
                                ]
                            },
                            lastname: {
                                identifier: 'lastname',
                                rules: [
                                    {
                                        type: 'empty',
                                        prompt: 'Please enter your last name'
                                    }
                                ]
                            },
                            dob: {
                                identifier: 'dob',
                                rules: [
                                    {
                                        type: 'empty',
                                        prompt: 'Please enter a valid date of birth'
                                    }
                                ]
                            },
                            address: {
                                identifier: 'address',
                                rules: [
                                    {
                                        type: 'empty',
                                        prompt: 'Please enter a valid address'
                                    },
                                    {
                                        type: 'length[10]',
                                        prompt: 'Your address must be at least 10 characters'
                                    }
                                ]
                            },
                            email: {
                                identifier: 'email',
                                rules: [
                                    {
                                        type: 'empty',
                                        prompt: 'Please enter your e-mail'
                                    },
                                    {
                                        type: 'email',
                                        prompt: 'Please enter a valid e-mail'
                                    }
                                ]
                            },
                            username: {
                                identifier: 'username',
                                rules: [
                                    {
                                        type: 'empty',
                                        prompt: 'Please enter a username'
                                    },
                                    {
                                        type: 'length[5]',
                                        prompt: 'Your username must be at least 5 characters'
                                    }
                                ]
                            },
                            password: {
                                identifier: 'password',
                                rules: [
                                    {
                                        type: 'empty',
                                        prompt: 'Please enter your password'
                                    },
                                    {
                                        type: 'length[6]',
                                        prompt: 'Your password must be at least 6 characters'
                                    }
                                ]
                            }
                        }
                    })
                ;
            })
        ;
    </script>
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

<?php

$player_id = $_GET['player'];

$sql_player_search = "SELECT * FROM `players` WHERE `player_id`='$player_id'";
$search_result = mysqli_query($db_con, $sql_player_search);
$result_row = mysqli_fetch_assoc($search_result);

?>


<div class="ui segment">
    <img class="ui centered medium image" src="<?php echo $result_row['player_picture'] ?>">

    <table class="ui padded table">
        <thead>
        <tr>
            <th>About</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php print nl2br($result_row['player_summary'], true); ?></td>
        </tr>
        </tbody>
    </table>
</div>

<?php

if (isset($_SESSION['username'])) { ?>

    <form class="ui large form" action="../controllers/new_post.php" method="post">
        <div class="field">
<!--            <label>Comment</label>-->
            <textarea name="post" placeholder="Comment here..."></textarea>
            <input type="hidden" name="player" value="<?php echo $result_row['player_id'] ?>">
        </div>
        <div class="ui fluid large teal submit button">Post Comment</div>
    </form>


    <?php
}
?>

<?php

$sql_search_comments = "SELECT * FROM `post` WHERE `player_id`='$player_id'";
$search_comments_result = mysqli_query($db_con, $sql_search_comments);
?>


<?php if(mysqli_num_rows($search_comments_result)>0) {?>

<div class="ui comments">
    <h3 class="ui dividing header">Comments</h3>

<?php while($row = mysqli_fetch_array($search_comments_result)) {?>

    <div class="comment">
        <a class="avatar">
            <img src="https://semantic-ui.com/images/avatar/small/matt.jpg">
        </a>
        <div class="content">
            <a class="author"><?php echo $row['username'] ?></a>
            <div class="metadata">
                <span class="date"><?php echo $row['timestamp'] ?></span>
            </div>
            <div class="text">
                <?php echo $row['comment'] ?>
            </div>
        </div>
    </div>

<?php
}
?>
</div>
<?php }

?>





</body>

