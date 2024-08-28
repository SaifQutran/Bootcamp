<?php

function getPINs($observed)
{
    $probables = [
        array('8', '0'),
        array('1', '2', '4'),
        array('1', '2', '3', '5'),
        array('3', '2', '6'),
        array('4', '1', '5', '7'),
        array('5', '2', '4', '6', '8'),
        array('6', '3', '5', '9'),
        array('7', '8', '4'),
        array('5', '7', '0', '9', '8'),
        array('9', '6', '8')
    ];
    $combinations = [''];

    foreach (str_split($observed) as $digit) {
        echo "digit : $digit <br>";
        $newCombinations = [];
        foreach ($combinations as $combination) {
            echo "combination : $combination <br>";
            foreach ($probables[$digit] as $adjacent) {
                $newCombinations[] = $combination . $adjacent;
                echo "combination + adjacent : " . $combination . $adjacent . "<br>";
            }
        }
        $combinations = $newCombinations;
    }
    return $combinations;
}
print_r ( getPINs ( '369' ) );
echo "test";
