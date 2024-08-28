<?php
function test($a, $b)
{
    if ($b == 0)
        throw new Exception("You can't devide by zero");
    else
        return $a / $b;
}

function secondTest($a, $b)
{
    try {
        $c = $a / $b;
        echo "good job";
    } catch (Error $e) {
        echo "no no no , dont devide on zero";
    }
}
echo test(8, 2);
echo secondTest(8, 0);
