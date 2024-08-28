<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>

<body><?php
        include 'extentions.php';
        include 'functions.php';
        $spe = !empty($_REQUEST['p']) ? $_REQUEST['p'] : "";
        $currentDir = '../../' . $spe;
        echo $currentDir;
        $path = "<span class='fa fa-house'></span>/$spe";
        if (is_dir($currentDir)) {

            $dir = scandir($currentDir);
        ?><div class="Path"><?= $path ?></div>
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

                    //echo getcwd();
                    print_r($dir);

                    for ($i = 2; $i < count($dir); $i++) {
                        $fileName = $currentDir . $dir[$i];
                        if (is_dir($fileName)) {
                    ?><tr>
                        <!-- <td></td> -->
                        <td style="vertical-align: middle;" colspan="2"><a href='?p=<?php echo urlencode($spe . $dir[$i]) . '/' ?>'><i class="fa fa-folder folder"></i><?= $dir[$i] ?></a></td>
                        <td>Folder</td>
                        <td><?= date("d/m/Y H:i:s", filemtime($currentDir . $dir[$i])) ?></td>
                        <td>Folder</td>
                    </tr><?php

                        } else {
                            ?><tr>
                        <td><i class="<?= determineEx($dir[$i]) ?>"></i></td>
                        <td><a href="?p=<?= $spe . $dir[$i] ?>"><?= $dir[$i] ?></a></td>
                        <td><?= sizeWithUnit(filesize($currentDir . $dir[$i])) ?></td>
                        <td><?= date("d/m/Y H:i:s", filemtime($currentDir . $dir[$i])) ?></td>
                        <td><a href=""><i class="fa fa-pencil action"></i></a><a href=""><i class="fa fa-trash action"></i></a><a href=""><i class="fa fa-chain action"></i></a><a href=""><i class="fa fa-copy action"></i></a><a href=""><i class="fa fa-download action"></i></a></td>
                    </tr><?php
                        }
                    }

                            ?>
        </table><?php } else { ?>
        <div id="fileBox">
            <div class="fileData">
                <a href="#" onclick="biggerFont()"><i class="fa fa-arrow-up"></i></a>
                <a href="#" onclick="smallerFont()"><i class="fa fa-arrow-down"></i></a>

            </div>
            <div id="fileContent">

                <?php
                echo $currentDir;
                $file = fopen($currentDir, 'r');
                while (!feof($file)) {
                    echo '<pre>' . fgets($file) . '</pre>';
                }
                fclose($file);
                ?>
            </div>
        </div>

    <?php }

    ?>