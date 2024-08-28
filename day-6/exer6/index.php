<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
</head>
<table border="2">

    <?php
    for ($i = 0; $i <= 12; $i++) {
        echo '<tr>';
        for ($j = 0; $j <= 12; $j++) {
            echo "<td> $i X $j = " . $i * $j . "</td>";
        }
        echo '</tr>';
    }
    ?>
</table>