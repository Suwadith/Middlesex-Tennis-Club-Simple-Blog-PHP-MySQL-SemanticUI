<?php

require_once("../controllers/server_config.php");
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['user_id'])) {
    header("Location: ../pages/home.php");
}
?>

<head>
    <link rel="stylesheet" type="text/css" href="../assets/semantic/semantic.css">
    <script
            src="../assets/js/jquery-3.1.1.min.js"></script>
    <script src="../assets/semantic/semantic.js"></script>
</head>


<style type="text/css">
    body {
        background-color: #DADADA;
    }

    body > .grid {
        height: 100%;
    }

    .image {
        margin-top: -100px;
    }

    .column {
        max-width: 450px;
    }
</style>
<script>
    $(document)
        .ready(function () {
            $('.ui.form')
                .form({
                    fields: {
                        username: {
                            identifier: 'username',
                            rules: [
                                {
                                    type: 'empty',
                                    prompt: 'Please enter your username'
                                }
                            ]
                        },
                        password: {
                            identifier: 'password',
                            rules: [
                                {
                                    type: 'empty',
                                    prompt: 'Please enter your password'
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

<div class="ui middle aligned center aligned grid">
    <div class="column">
        <h2 class="ui teal image header">
            <div class="content">
                Log-in
            </div>
        </h2>

        <?php

        if(isset($_SESSION["incorrect_password"]) && $_SESSION["incorrect_password"]=true) {
            echo '<p color="red">'.$_SESSION["error_message"].'</p>';
        } else if (isset($_SESSION["incorrect_username"]) && $_SESSION["incorrect_username"]=true) {
            echo '<p color="red">'.$_SESSION["error_message"].'</p>';
        }

        unset($_SESSION["incorrect_password"], $_SESSION["incorrect_username"], $_SESSION["error_message"]);

        ?>

        <form class="ui large form" action="../controllers/login_verification.php" method="post">
            <div class="ui stacked segment">
                <div class="field">
                    <div class="ui left icon input">
                        <i class="user icon"></i>
                        <input type="text" name="username" placeholder="Username" required>
                    </div>
                </div>
                <div class="field">
                    <div class="ui left icon input">
                        <i class="lock icon"></i>
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                </div>
                <div class="ui fluid large teal submit button">Login</div>
            </div>

            <div class="ui error message"></div>

        </form>

        <div class="ui message">
            New to us? <a href="registration.php">Sign Up</a>
        </div>
    </div>
</div>

</body>
<?php
