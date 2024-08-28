<?php
Date_default_timezone_set('Asia/Riyadh');
$isNight = date('h') <   17;
if ($isNight)
    $class = 'moon';
else
    $class = 'sun';
?>
<style>
    .sun {
        border-radius: 100%;
        width: 200px;
        height: 200px;
        background-color: yellow;
        position: absolute;
        right: -50px;
        box-shadow: yellow 0px 0px 20px;
        top: -40px;
    }

    .moon {
        border-radius: 100%;
        width: 150px;
        height: 150px;
        background-color: lightgrey;
        position: absolute;
        left: -15px;
        box-shadow: white 0px 0px 10px;
        top: 10px;
    }
</style>

<body style="<?php echo  $isNight ? 'background-color:darkslateblue ;color:white;' : 'background-color: skyblue;color:black' ?>">
    <div class="<?= $class ?>">

    </div>
    <center>
        <h1><?php echo $isNight ? 'Good Night' : 'Good Morning'; ?></h1>
    </center>
</body>