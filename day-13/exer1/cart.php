<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>

<body>

</body>

</html>
<?php
session_start();
?>
<table class="table table-striped-columns table-bordered table-hover">
    <tr>
        <th>product</th>
        <th>price</th>
    </tr>
    <?php $total = 0;
    foreach ($_SESSION['prod'] as $product) {
        echo '<tr>';
        echo "<td class='ml-3'>" . $product[0] . '</td>';
        $total += $product[1];
        echo "<td class='ml-3'>" . $product[1] . '$</td></tr>';
    }
    ?>
    <tr>
        <th class="ml-5">
            Quantity: <?= count($_SESSION['prod']) ?>
        </th>
        <th class="ml-5">
            Total Price: <?= $total ?>$
        </th>
    </tr>
</table>
<?php
