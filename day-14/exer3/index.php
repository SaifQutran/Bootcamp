<?php
function removeNb($n)
{
    echo $n;
    $sum = Sum($n);
    
    for ($i = round($n / 2); $i < $n; $i++) {
        for ($j = round($n / 2); $j < $n; $j++) {
            if ($i * $j == $sum - $j - $i)
                return [[$i, $j], [$j, $i]];
        }
    }
    return [];
}
function Sum($n)
{
    $total = 0;
    for ($i = 1; $i <= $n; $i++)
        $total += $i;
    return $total;
}
($sum - $i) % $i;
function removNb($n)
{
    $sum = ($n * ($n + 1)) / 2;
    $result = [];

    for ($a = 1; $a <= $n; $a++) {
        $b = ($sum - $a) / ($a + 1);
        if ($b <= $n && is_int($b)) {
            $result[] = [$a, (int)$b];
        }
    }

    return $result;
}
var_dump(removeNb(1000001));
