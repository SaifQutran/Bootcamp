<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<?php
Date_default_timezone_set('Asia/Riyadh');
$isNight = date('H') >   18 || date('H') < 6;
$username = "SaifQutran";
$password = 'test';
session_start();
?>

<body class="<?= $isNight ? "darkBack" : "lightBack" ?>">
    <?php if (key_exists('agree', $_COOKIE) && $_COOKIE['agree'] == 'on') {
    ?>
        <script>
            alert("you are authorized");
        </script><?php
                    $_SESSION['username'] = $_COOKIE['username'];
                    header("Location: dashboard.php");
                } else {
                    ?>

        <div class="formContainer <?= $isNight ? "darkForm" : "lightForm" ?>">
            <div class="formHeader">
                <i class="bi bi-spotify logo <?= $isNight ? "darkContent" : "spotify" ?> transBack"></i>
            </div>
            <form action="#" method="POST">
                <!-- Email input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <input name="username" type="text" id="form2Example1" class="form-control" />
                    <label class="form-label <?= $isNight ? "darkContent" : "lightContent" ?>" for="form2Example1">Username</label>
                </div>

                <!-- Password input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <input type="password" name="password" id="form2Example2" class="form-control" />
                    <label class="form-label <?= $isNight ? "darkContent" : "lightContent" ?>" for="form2Example2">Password</label>
                </div>

                <!-- 2 column grid layout for inline styling -->
                <div class="row mb-4">
                    <div class="col d-flex justify-content-center">
                        <!-- Checkbox -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="rememberMe" id="form2Example31" checked />
                            <label class="form-check-label <?= $isNight ? "darkContent" : "lightContent" ?>" for="form2Example31"> Remember me </label>
                        </div>
                    </div>

                    <div class="col">
                        <!-- Simple link -->
                        <a class="<?= $isNight ? "darkContent" : "lightContent" ?>" href="#!">Forgot password?</a>
                    </div>
                </div>

                <!-- Submit button -->
                <center>
                    <input value="submit" style="text-align: center;" type="submit" name="submit" class="btn btn-primary btn-block mb-4" />
                </center>

                <!-- Register buttons -->
                <div class="text-center">
                    <p class="<?= $isNight ? "darkContent" : "lightContent" ?>">Sign up with:</p>
                    <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                        <i class="fab fa-facebook-f <?= $isNight ? "darkIcon" : "lightIcon" ?>"></i>
                    </button>

                    <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                        <i class="fab fa-google <?= $isNight ? "darkIcon" : "lightIcon" ?>"></i>
                    </button>

                    <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                        <i class="fab fa-twitter <?= $isNight ? "darkIcon" : "lightIcon" ?>"></i>
                    </button>

                    <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                        <i class="fab fa-github <?= $isNight ? "darkIcon" : "lightIcon" ?>"></i>
                    </button>
                </div>
            </form>
        </div>
    <?php } ?>
    <?php
    if (isset($_POST['submit'])) {
        if ($_POST['username'] == $username && $_POST['password'] == $password) {
    ?> <script>
                alert('in1')
            </script>
            <?php
            //  echo $_POST['rememberMe'];
            if (key_exists('rememberMe', $_POST) && $_POST['rememberMe'] == 'on') {
            ?> <script>
                    alert('in2')
                </script>
            <?php
                setcookie('username', $_POST['username'], time() + 4000);
                setcookie('agree', $_POST['rememberMe'], time() + 4000);
                $_SESSION['username'] = $_COOKIE['username'];
            } else {
                setcookie('username', $_POST['username'], time() + 4000);
                $_SESSION['username'] = $_COOKIE['username'];
            }
            header("Location: dashboard.php");
        } else {
            ?>
            <script>
                alert('The username or the password are wrong')
            </script>
    <?php
        }
        //print_r($_POST);
    }
    ?>
</body>

</html>