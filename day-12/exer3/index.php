<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

</body>

</html>
<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['username'])) {
        setcookie('username', $_POST['username'], time() + 100);
        // setcookie(,)
    }
}
if (isset($_POST['forget'])) {
    if (isset($_POST['username'])) {
        setcookie('username', $_POST['username'], time() - 100);
    }
}
?>
<form method="POST" style="background-color:aliceblue; text-align: center;">
    <label for="inputUsername5" class="form-label">Username</label>
    <center>

        <input type="text" name="username" id="inputUsername5" class="form-control mb-3" style="width:200px; background-color:<?= key_exists('username', $_COOKIE) ? 'bisque;border:solid black 2px;' : "white;" ?>" value="<?= key_exists('username', $_COOKIE) ? $_COOKIE['username'] : "" ?>">
    </center>
    <input type="submit" name="submit" class="btn btn-primary mb-3">
    <input type="submit" value="Forget me"  name="forget" class="btn btn-primary mb-3">

</form>