<?php
require 'isValid.php';
$number = "779021401";
//echo preg_match("/(00967)?7[01378][0-9]{7}$/", $number);
$email = [
    "saif23qut@gmail.com",
    "s@yahoo.com",
    "1213@yaho.org",
    "sda3123@yaho.org",
    "sami@hotmail.c",
    "sami@hotmail.or",
    "sami_salem@gmail.com",
    "@g.com",
    "_1@gmail.com",
    "_sami@ggmil.com",
    "1321sami@ggmil.com",
    "salma@ggmiledu",
    "salma@ggmil.ye",
    "saaif@gmail.com"
];

foreach ($email as $e) {
    checkEmail($e);
}

function checkEmail($email)
{
    echo "$email = " . preg_match("/[_ a-z]+[_a-z0-9]+@[a-z]{2,}\.[a-z]{2,3}/", $email) . "<br>";
}
