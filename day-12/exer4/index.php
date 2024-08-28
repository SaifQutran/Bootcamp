<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <style>
        label[for="imgInp"] {
            background-size: contain;
            background-color: rgba(240, 248, 255, 0.6);
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 2px grey solid;
            width: 450px;
            height: 450px;
            margin: auto;
            border-radius: 50%;
            text-align: center;
            font-size: 28px;

        }

        input[type="file"] {
            display: none;
        }
    </style>
</head>
<?php
$imagePath;
$fileName = '';
// echo $_COOKIE['profile'];
if (isset($_POST['submit'])) {
    // echo "in";
    if ($_FILES['image']['size'] != 0) {
        $currentDir = "uploads/";
        $fileName = $currentDir . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $fileName);
        setcookie('profile', $fileName, time() + 200);
    } else {
        echo "<p style='color:red;font-size:28px; text-align:center;' >Enter an image please<p>";
    }
}
if (isset($_POST['clear'])) {
    if (key_exists('name', $_FILES['image'])) {
        $currentDir = "uploads/";
        $fileName = $currentDir . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $fileName);
        setcookie('profile', $fileName, time() - 200);
    }
}
?>

<script>
    function clear() {
        const [file] = imgInp.files;
        if (file) {
            piclabel.style.background = '';
            piclabel.style.backgroundSize = 'unset';
            piclabel.innerHTML = 'Profile image';
            piclabel.style.backgroundPosition = 'center';
        }
    }

    function set() {
        alert('<?= $fileName ?>');

        const [file] = imgInp.files;
        if (file) {
            piclabel.style.background = "url('<?= $fileName ?>')";
            piclabel.style.backgroundSize = 'cover';
            piclabel.innerHTML = '';
            piclabel.style.backgroundPosition = 'center';
        }
    }

    function set2() {
        let fileName = "<?= key_exists('profile', $_COOKIE) ? $_COOKIE['profile'] : "" ?>";

        alert('clicked');
        if (fileName != '') {
            piclabel.style.background = "url('" + fileName + "')";
            piclabel.style.backgroundSize = 'cover';
            piclabel.innerHTML = '';
            piclabel.style.backgroundPosition = 'center';
        }
    }
</script>

<body>
    <form method="post" action="" enctype="multipart/form-data">
        <label for="imgInp" id="piclabel" style=<?= key_exists('profile', $_COOKIE) ? "'background: url(\"" . $_COOKIE['profile'] . "\");background-position: center;background-size: cover;'>" : "''>Profile image" ?> </label>
            <input type="file" name="image" id="imgInp" placeholder="pic" accept="image/*" />
            <center>
                <input type="submit" value="Submit" name="submit" onclick="set2()" class="btn btn-primary mt-3">
                <input type="submit" value="Clear" name="clear" onclick="clear()" class="btn btn-danger mt-3">
            </center>
    </form>
</body>

</html>