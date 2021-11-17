<?php

require_once("../controllers/server_config.php");
session_start();

if (isset($_SESSION['username'])) {
    header("Location: ../pages/home.php");
}
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

        body > .grid {
            height: 100%;
        }
        body {
            margin-top: 2%;
            margin-left: 5%;
            margin-right: 5%;
        }


        .column {
            max-width: 450px;
        }

        .menu {
            margin-top: 0;
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

<div class="ui middle aligned center aligned grid">
    <div class="column">
        <h2 class="ui teal image header">
            <div class="content">
                Sign-up
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
                    <label>Date of Birth</label>
                    <input type="date" name="dob" required>
                </div>
                <div class="field">
                    <input type="text" name="address" placeholder="Address" required>
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
