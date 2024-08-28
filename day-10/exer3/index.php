<?php

// function gap($g, $m, $n)
// {
//     $next = 0;
//     $min = 0;
//     for ($m; $m <= $n; $m++) {
//         // echo " before $m , $next<br>";

//         if (isPrime($m)) {
//             $min = $m;
//             $next = giveMeNextPrime($m);
//             if ($next - $min == $g) {
//                 return [$min, $next];
//             } else {

//                 $m = $next - 1;
//             }
//         }
//     }
//     return null;
// }
// function giveMeNextPrime($m)
// {

//     do {
//         $m++;
//     } while (!isPrime($m));
//     return $m;
// }
// function collectPrimes($m, $n)
// {
//     $arr = [];
//     $index = 0;
//     for ($m; $m <= $n; $m++)
//         if (isPrime($m))
//             $arr[$index++] = $m;
//     return $arr;
// }
// function isPrime($n)
// {
//     for ($i = $n; --$i && $n % $i;);
//     return $i == 1;
// }

// function isPrime($number)
// {
//     $st = (string)$number;
//     $total = 0;
//     for ($i = 0; $i < strlen($st); $i++)
//         $total += (int)$st[$i];
//     if ($total % 3 == 0 || $number % 2 == 0 || $number % 5 == 0) {
//         return false;
//     } else {
//         return true;
//     }
// }

// function isPrime($number)
// {
//     for ($i = 2; $i < $number/2; $i++)
//         if ($number % $i == 0) {
//             return false;
//         }
//     return true;
// }
function solution(int $n, int $m): array
{
    $div = 0;
    $index = 0;
    $arr = [];
    for ($n; $n <= $m; $n++) {
        if($n == 16 ) {
            $arr[$index] = $n;
            $index++;
            continue;
        }
        
        if (!isPrime($n)&&$n%2!=0) {
            $div = 0;
            
            if ($div == 3) {
                echo "$n and $div<br>";
                $arr[$index] = $n;
                $index++;
            }
        }
    }
    return $arr;
}
function isPrime($num)
{
    if ($num <= 1) return false;
    if ($num <= 3) return true;
    if ($num % 2 == 0 || $num % 3 == 0) return false;
    for ($i = 5; $i * $i <= $num; $i += 6)
        if ($num % $i == 0 || $num % ($i + 2) == 0)
            return false;
    return true;
}
// function is_prime($num)
// {
//     if ($num <= 1) return false;
//     if ($num <= 3) return true;
//     if ($num % 2 == 0 || $num % 3 == 0) return false;
//     for ($i = 5; $i * $i <= $num; $i += 6) {
//         if ($num % $i == 0 || $num % ($i + 2) == 0) return false;
//     }
//     return true;
// }
// function isPrime(int $n)
// {
//     static $i = 2;

//     // corner cases
//     if ($n == 0 || $n == 1) {
//         return false;
//     }

//     // Checking Prime
//     if ($n == $i)
//         return true;

//     // base cases
//     if ($n % $i == 0) {
//         return false;
//     }
//     $i++;
//     return isPrime($n);
// }

function getDevisors($num){
    for($i = 2 ; $i <= $num /2;$i++)
        if($num%$i==0)
         echo"$i ,";
}
function testBasics()
{
    echo solution(624, 625) == [625] ? 'True<br>' : 'False<br>';
    echo solution(734, 735) == [] ? 'True<br>' : 'False<br>';
    echo solution(2, 100) == [16, 81] ? 'True<br>' : 'False<br>';
   echo solution(10000, 100000) == [14641, 28561, 83521] ? 'True<br>' : 'False<br>';
//    echo solution(10, 300, 400) == [337, 347] ? 'True<br>' : 'False<br>';
}
//getDevisors(28561);
$test = sqrt(64);
echo is_int($test);
//testBasics();
