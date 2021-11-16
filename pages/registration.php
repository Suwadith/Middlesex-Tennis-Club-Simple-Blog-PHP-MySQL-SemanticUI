<?php

require_once("../controllers/server_config.php");
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['userid'])) {
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

    input:invalid {
        border: 2px dashed red;
    }

    input:invalid:required {
        background-image: linear-gradient(to right, pink, lightgreen);
    }

    input:valid {
        border: 2px solid black;
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

<div class="ui middle aligned center aligned grid">
    <div class="column">
        <h2 class="ui teal image header">
            <div class="content">
                Registration
            </div>
        </h2>

        <?php

        if(isset($_SESSION["success"]) && $_SESSION["success"]=true) {
            echo '<p color="green">Account Created Successfully. <a href="login.php">Click here</a> to login!<p>';
        } else if (isset($_SESSION["error_message"])) {
            echo '<p color="red">'.$_SESSION["error_message"].'</p>';
        } else if(isset($_SESSION["account_found"])) {
            echo '<p color="red">'.$_SESSION["account_found"].'</p>';
        }

        unset($_SESSION["success"], $_SESSION["error_message"], $_SESSION["account_found"]);

        ?>

        <form class="ui large form" action="../controllers/new_registration.php" method="post">

            <div class="ui stacked segment">
                <div class="field">
                    <input type="text" name="firstname" placeholder="First Name" required>
                </div>
                <div class="field">
                    <input type="text" name="lastname" placeholder="Last Name" required>
                </div>
                <div class="field">
                    <input type="text" name="email" placeholder="E-mail address" required>
                </div>
                <div class="field">
                    <input type="text" name="username" placeholder="Username" required>
                </div>
                <div class="field">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="ui fluid large teal submit button">Sign Up</div>

            </div>


            <div class="ui error message"></div>

        </form>

        <div class="ui message">
            Already have an account? <a href="login.php">Sign in</a>
        </div>
    </div>
</div>

</body>
<?php
