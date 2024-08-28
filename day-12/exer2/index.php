<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_POST['submit'])) {
        if (isset($_POST['text'])) {
            //setcookie('username', $_POST['text'],time()+5);

        }
    }
    ?>
    <form method="post">
        <input type="text" name="text" id="text">
        <input type="submit" value="send" name="submit">
        <input type="button" value="Forget me" onclick="" name="forget" class>
    </form>
    <p><?= $_COOKIE['username'] ?></p>
</body>

</html>