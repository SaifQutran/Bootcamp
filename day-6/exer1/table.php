<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.2.3/css/flag-icons.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>


<?php
if (isset($_FILES['image'])) {
    $aExtraInfo = getimagesize($_FILES['image']['tmp_name']);
    $sImage = "data:" . $aExtraInfo["mime"] . ";base64," . base64_encode(file_get_contents($_FILES['image']['tmp_name']));
}



error_reporting(E_ERROR);
$arabic_countries_abbreviations = [
    "Algeria" => "dz",
    "Bahrain" => "bh",
    "Comoros" => "km",
    "Djibouti" => "dj",
    "Egypt" => "eg",
    "Iraq" => "iq",
    "Jordan" => "jo",
    "Kuwait" => "kw",
    "Lebanon" => "lb",
    "Libya" => "ly",
    "Mauritania" => "mr",
    "Morocco" => "ma",
    "Oman" => "om",
    "Palestine" => "ps",
    "Qatar" => "qa",
    "Saudi Arabia" => "sa",
    "Somalia" => "so",
    "Sudan" => "sd",
    "Syria" => "sy",
    "Tunisia" => "tn",
    "United Arab Emirates" => "ae",
    "Yemen" => "ye"
];

?>


<body id="bodyId">
    <?php
    $agree = $_REQUEST['check'];

    if ($agree == 'on') {

        $name = $_REQUEST['name'];
        $date = $_REQUEST['day'] . '/' . $_REQUEST['month'] . '/' . $_REQUEST['year'];
        $gender = $_REQUEST['gender'];
        $email = $_REQUEST['email'];
        $country = $_REQUEST['country'];
        $phone =  $_REQUEST['phone'];
        $password = $_REQUEST['password'];
        $username = '@' . $_REQUEST['username'];
    ?>

        <div class="profil">
            <div class="noLine">
                <img class="profilImg" src="<?= $sImage ?>" alt="">
            </div>
            <div class="profilData">
                <h1 class="Name"><?= $name ?></h1>
                <h3 class="username"><?= $username ?><?php echo $gender == 'Male' ? '&#129492;' : '&#129493;';
                                                        ?> <i class="fi fi-<?= $arabic_countries_abbreviations[$country] ?>" style="border-radius: 2px;"></i></h3>
                <h4 class="birthdate"><i class="fa-solid fa-calendar-days"></i> <?= $date ?></h4>
            </div>
    </hr>
            <div class="noLine">


                <h5 class="email"><i class=" fa-solid fa-envelope"></i><?= $email ?></h5>
                <h5 class="phone"><i class=" fa fa-phone"></i><?= $phone ?></h5>

            </div>
        </div>
    <?php } else {
        print("<h1 class='rejected'>You don't agree the terms of use</h1>");
    } ?>
</body>