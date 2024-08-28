<?php
$fileName = 'test.txt';
$file = fopen($fileName, 'r');
$size = filesize($fileName);
for ($i = 1; $i <= $size; $i++) {
    echo str_repeat(fread($file, 1), $i);
    echo "<br>";
}
echo fgets($file)
echo fread($file, 4) . "<br>";
fclose($file);
