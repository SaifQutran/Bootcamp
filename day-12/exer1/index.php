<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        table {
            width: 95%;
            margin: auto;
            margin-right: 60px;
        }

        .green {
            color: green;
        }

        .red {
            color: red;
        }

        .orange {
            color: orange;
        }

        td i {
            font-size: 34px;
        }

        td:nth-child(1) {
            width: 40px;
        }

        tr:nth-child(1) {
            background-color: brown;
            color: wheat;
        }

        tr:nth-child(even) {
            background-color: bisque;
        }

        .folderTile {
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            position: absolute;
            margin-top: -5px;
            width: 30px;
            height: 5px;
            background-color: goldenrod;
            color: goldenrod;
        }

        /* .folder {
            border-radius: 5px;
            width: 70px;
            height: 50px;
            background-color: goldenrod;
            border-top-left-radius: 0px;
            } */
        .folder {
            color: goldenrod;
        }

        .dull {
            color: gray;
        }

        .live {
            color: deepskyblue;
        }

        /* .fileTile {
            position: absolute;
            margin-top: -9px;
            margin-left: 40px;
            width: 20px;
            height: 20px;
            transform: rotate(45deg);
            background-color: white;
            color: white;
        } */
        #fileBox {
            width: 93%;
            border: solid 2px grey;
            box-shadow: inset 0px 0px 5px grey;
            border-radius: 12px;
            margin: auto;
            padding: 15px;
        }

        #fileContent {
            font-size: 12px;
            text-wrap: wrap;
        }

        .fileData {
            margin-left: -15px;
            margin-top: -15px;
            width: 100%;
            border-top-left-radius: 10px;
            padding: 15px;
            border-top-right-radius: 10px;
            height: 20px;
            background-color: grey;
        }

        tr {
            text-align: left;
            transition: all ease-in-out 0.2s;
        }

        tr:hover {
            background-color: rgb(200, 200, 200);
        }

        h2 {
            margin-left: 15px;
        }

        .action {
            margin: 2px;
            background-color: brown;
            color: wheat;
            transition: ease-in-out all 0.3s;
            padding: 5px;
            border-radius: 4px;
            border: brown 2px solid;
        }

        .action:hover {
            color: brown;
            border: brown 2px solid;
            background-color: wheat;
        }

        td,
        tr {
            padding: 10px;
        }

        /* .file {
            width: 50px;
            height: 70px;
            background-color: gray;
        } */
    </style>
</head>

<body>

</body>

</html>
<?php
include '/xampp/htdocs/bootCamp/day-11/exer2/functions.php';
include '/xampp/htdocs/bootCamp/day-11/exer2/extentions.php';
function valueExists(array $dir, string $value): bool
{
    foreach ($dir as $doc) {
        if ($doc == $value)
            return true;
    }
    return false;
}

if (isset($_POST['upload'])) {

    $fileType = $_FILES['photo']['type'];
    $file = $_FILES['photo']['name'];
    $fileSize = $_FILES['photo']['size'];
    $fileTmpName = $_FILES['photo']['tmp_name'];
    $dir = scandir('uploads/');
    if ($fileType != "application/pdf") {
        echo "The file should be pdf";
    } else {

        if (!valueExists($dir, $file)) {
            move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/' . $_FILES['photo']['name']);
            echo $file . "<br>" . sizeWithUnit($fileSize);
        } else {
            echo "There is a document with the same name";
        }
    }
    ?>
    <form enctype="multipart/form-data" method="post">
        <input type="file" name="photo" accept="application/pdf"><br>
        <input type="submit" value="upload" name="upload">
    </form>
    <table cellspacing="0">
        <tr>
            <th colspan="2">
                <h2>Name </h2>
            </th>
            <th>
                <h2>Size </h2>
            </th>
            <th>
                <h2>Modified</h2>
            </th>
            <th>
                <h2>Actions</h2>
            </th>
        </tr><?php
                $currentDir = "uploads/";
                for ($i = 2; $i < count($dir); $i++) {
                    $fileName = $currentDir . $dir[$i];
                    if (is_file($fileName)) {
                ?><tr>
                    <td><i class="<?= determineEx($dir[$i]) ?>"></i></td>
                    <td><a href="?p=<?= $dir[$i] ?>"><?= $dir[$i] ?></a></td>
                    <td><?= sizeWithUnit(filesize($currentDir . $dir[$i])) ?></td>
                    <td><?= date("d/m/Y H:i:s", filemtime($currentDir . $dir[$i])) ?></td>
                    <td><a href=""><i class="fa fa-pencil action"></i></a><a href=""><i class="fa fa-trash action"></i></a><a href=""><i class="fa fa-chain action"></i></a><a href=""><i class="fa fa-copy action"></i></a><a href=""><i class="fa fa-download action"></i></a></td>
                </tr>
                </tr><?php

                    }
                }

                        ?>
    </table>
<?php }
?>