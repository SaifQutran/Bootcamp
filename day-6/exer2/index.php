<?php
$x = 7;
$str = "Yemen";

function strLength(String $p)
{
    $i = 0;
    
    while ($p[$i]) {
        $i++;
    }

    return $i;
}
echo strLength($str);
echo '<br>';
echo str_word_count('This function count words');
echo '<br>';
echo strrev('This text is reversed');
echo '<br>';
$toFind = 'Saif Al-Islam Ahmed Saleh Qutran';
echo strpos($toFind, ' Saleh');
echo '<br>';
echo str_ireplace('jon', 'Saif', 'Hello JoN, how are you jOn');
echo '<br>';
