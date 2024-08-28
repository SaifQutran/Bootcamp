<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignments</title>
    <style>
        body {
            margin-left: 10%;
            margin-top: 50px;
            margin-right: 10%;
        }

        .main-title {
            text-align: center;
            color: rgb(25, 2, 70);
            text-transform: uppercase;
            margin-bottom: 20px;
        }

        .all {
            width: 100%;
            display: flex;
            justify-content: space-evenly;
        }

        .card-img {
            display: inline;
            margin-bottom: 20px;
            width: 23%;
            margin-left: 10px;
            margin-right: 10px;
            border-radius: 10px;
            background-color: bisque;
        }

        .card-img img {
            border-radius: 10px 10px 0 0;
            width: 100%;
            height: 250px;
        }

        .content {
            padding-bottom: 7px;
        }

        .content h5 {
            margin-bottom: 15px;
            margin-top: 10px;
            text-align: center;
            font-size: 20px;
        }
    </style>
</head>
<?php
$Products = [
    'phone 1' => 'app-1.jpg',
    'phone 2' => 'app-2.jpg',
    'phone 3' => 'app-3.jpg',
    'book 1' => 'app-4.jpg',
    'book 2 ' => 'app-5.jpg',
    'book 3' => 'app-6.jpg',
    'creams' => 'app-7.jpg',
    'skin care' => 'app-8.jpg',
    'protein powder' => 'app-9.jpg',
    'apple watch' => 'app-10.jpg',
    'camera' => 'app-11.jpg',
    'lamp' => 'app-12.jpg'
];
?>

<body>
    <h2 class="main-title"> gallery</h2>
    <?php /*
    $from = 1;
    for ($m = 0; $m < 3; $m++) {

    ?>
        <div class="all">
            <?php
            $to = $from + 3;
            for ($from; $from <= $to; $from++) {
            ?>
                <div class="card-img">
                    <img src="assets/app-<?= $from ?>.jpg" alt="image">
                    <div class="content">
                        <h5>Product <?= $from ?></h5>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php
    } */ ?>

    <?php
    $lineCounter = 0;
    foreach ($Products as $productName => $imgURL) {
        if ($lineCounter == 0) {
            echo "<div class='all'>";
        }
    ?>
        <div class="card-img">
            <img src="assets/<?= $imgURL ?>" alt="image">
            <div class="content">
                <h5><?= $productName ?></h5>
            </div>
        </div>
        <?php $lineCounter++;
        if ($lineCounter == 4) {
            $lineCounter = 0;
            echo '</div>';
        }
        ?>
    <?php
    } ?>
    </div>




</body>

</html>