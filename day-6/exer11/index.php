<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignments</title>
    <style>
        * {
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        body {
            font-family: Helvetica;
            -webkit-font-smoothing: antialiased;
            background: rgba(71, 147, 227, 1);
        }

        h2 {
            text-align: center;
            font-size: 18px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: white;
            padding: 30px 0;
        }

        /* Table Styles */

        .table-wrapper {
            margin: 10px 70px 70px;
            box-shadow: 0px 35px 50px rgba(0, 0, 0, 0.2);
        }

        .fl-table {
            border-radius: 5px;
            font-size: 12px;
            font-weight: normal;
            border: none;
            border-collapse: collapse;
            width: 100%;
            max-width: 100%;
            white-space: nowrap;
            background-color: white;
        }

        .fl-table td,
        .fl-table th {
            text-align: center;
            padding: 8px;
        }

        .fl-table td {
            border-right: 1px solid #f8f8f8;
            font-size: 12px;
        }

        .fl-table th {
            color: #ffffff;
            background: #4FC3A1;
        }


        .fl-table th:nth-child(odd) {
            color: #ffffff;
            background: #324960;
        }

        .fl-table tr:nth-child(even) {
            background: #e8e8e8;
        }

        /* Responsive */

        @media (max-width: 767px) {
            .fl-table {
                display: block;
                width: 100%;
            }

            .table-wrapper:before {
                content: "Scroll horizontally >";
                display: block;
                text-align: right;
                font-size: 11px;
                color: white;
                padding: 0 0 10px;
            }

            .fl-table,
            .fl-table tbody,
            .fl-table th {
                display: block;
            }

            .fl-table th:last-child {
                border-bottom: none;
            }

            .fl-table thead {
                float: left;
            }

            .fl-table tbody {
                width: auto;
                position: relative;
                overflow-x: auto;
            }

            .fl-table td,
            .fl-table th {
                padding: 20px .625em .625em .625em;
                height: 60px;
                vertical-align: middle;
                box-sizing: border-box;
                overflow-x: hidden;
                overflow-y: auto;
                width: 120px;
                font-size: 13px;
                text-overflow: ellipsis;
            }

            .fl-table th {
                text-align: left;
                border-bottom: 1px solid #f7f7f9;
            }

            .fl-table tbody tr {
                display: table-cell;
            }

            .fl-table tbody tr:nth-child(odd) {
                background: none;
            }

            .fl-table tr:nth-child(even) {
                background: transparent;
            }

            .fl-table tr td:nth-child(odd) {
                background: #F8F8F8;
                border-right: 1px solid #E6E4E4;
            }

            .fl-table tr td:nth-child(even) {
                border-right: 1px solid #E6E4E4;
            }

            .fl-table tbody td {
                display: block;
                text-align: center;
            }
        }
    </style>
</head>
<?php
//instead of isset()
function SaifChecksVariable(mixed $x)
{
    if ($x == '')
        return false;
    return true;
}
//instead of strlen()
function SaifCountsChars(string $str)
{
    error_reporting(E_ERROR);
    $counter = 0;
    while ($str[$counter] != '') {
        $counter++;
    }
    return $counter;
}
//instead of str_word_count()
function SaifCountsWords(string $str)
{
    $count = SaifCountsChars($str);
    $wordCounter = 1;
    for ($i = 1; $i < $count; $i++) {
        if ($str[$i] == ' ' && $str[$i - 1] != ' ' && $i != $count - 1) {
            $wordCounter++;
        }
    }
    return $wordCounter;
}
$functions = [
    'print_r' => 'SaifEnhancesPrint_r',
    'strlen' => 'SaifCountsChars',
    'str_word_count' => 'SaifCountsWords',
    'array_values' => 'SaifGetsArrayValues',
    'array_keys' => 'SaifGetsArrayKeys',
    'count' => 'SaifCountsArrayElements',
    'max' => 'SaifGetsMaximum',
    'min' => 'SaifGetsMinimum',
    'is_array' => 'SaifIsArray',
    'strrev' => 'SaifReversesWord',
    'isset' => 'SaifChecksVariable',
    'array_key_exists' => 'SaifChecksArrayKey'
];
function SaifReversesWord(string $str)
{
    $copy = '';
    for ($i = 0, $j = SaifCountsChars($str) - 1; $i < SaifCountsChars($str); $i++, $j--) {
        $copy[$i] = $str[$j];
    }
    return $copy;
}
//instead of array_keys()
function SaifGetsArrayKeys(array $arr)
{
    $i = 0;
    foreach ($arr as $key => $item) {
        $newArr[$i++] = $key;
    }
    return $newArr;
}
//instead of array_values()
function SaifGetsArrayValues(array $arr)
{
    $i = 0;
    foreach ($arr as $key => $item) {
        $newArr[$i++] = $item;
    }
    return $newArr;
}
//instead of array_key_exists()
function SaifChecksArrayKey(mixed $key, array $arr)
{
    foreach ($arr as $keys => $item) {
        if ($keys == $key)
            return true;
    }
    return false;
}
//instead of min()
function SaifGetsMinimum(array $arr)
{
    $min = $arr[array_keys($arr)[0]];
    foreach ($arr as $key => $item) {
        if ($min > $item)
            $min = $item;
    }
    return $min;
}
function SaifGetsMaximum(array $arr)
{
    $max = $arr[array_keys($arr)[0]];
    foreach ($arr as $key => $item) {
        if ($max < $item)
            $max = $item;
    }
    return $max;
}
//instead of count()
function SaifCountsArrayElements(array $arr)
{
    $counter = 0;
    foreach ($arr as $key => $item) {
        $counter++;
    }
    return $counter;
}
function SaifEnhancesPrint_r(array $arr)
{
    echo '<br>Array (';
    foreach ($arr as $key => $item) {
        echo '<br>';
        echo "[$key] => $item ";
    }
    echo ')<br>';
    return 1;
}
function SaifIsArray($variable)
{
    return gettype($variable) === 'array';
}
?>
<div class="table-wrapper">
    <table class='fl-table'>
        <tr>
            <th>#</th>
            <th>Argument Value</th>
            <th>PHP's function name</th>
            <th>PHP's function result</th>
            <th>Saif's function name</th>
            <th>Saif's function result</th>
        </tr>
        <?php
        $x = 5;
        $inputs = [
            array('hour' => 4, 12, 'time' => "night", "clear", 'city' => "Dubai"),
            "Check the length of this string",
            "Check the word amount of this string",
            array(
                'key' => 'is there',
                2,
                4,
                5
            ),
            array(
                'key' => 'is there',
                2,
                4,
                5
            ),
            array(
                'key' => 'is there',
                2,
                4,
                5
            ),
            array(

                2,
                4,
                5,
                12,
                6,
                3
            ),
            array(

                2,
                4,
                5,
                12,
                6,
                3
            ),
            array(

                2,
                4,
                5,
                12,
                6,
                3
            ),
            "Last Function"
        ];
        $index = 0;
        $row = 1;
        foreach ($functions as $phps => $Saifs) {
            switch ($phps) {
                case "isset": {
                        $y = 5;
                        echo "<tr>";
                        echo "<td>" . $row++ . "</td>";
                        echo "<td>" . '$y = 5' . "</td>";
                        echo "<td>$phps</td>";
                        echo "<td>" . isset($y) . "</td>";
                        echo "<td>$Saifs</td>";
                        echo "<td>" . call_user_func($Saifs, $y) . "</td>";
                        echo "</tr>";
                        break;
                    }
                case "array_key_exists": {
                        echo "<tr>";
                        echo "<td>" . $row++ . "</td>";
                        echo "<td>" . "'TheKey', array('TheKey' => 1, 3, 5, 'AnotherKey' => 12)" . "</td>";
                        echo "<td>$phps</td>";
                        $tempArr = array('TheKey' => 1, 3, 5, 'AnotherKey' => 12);
                        echo "<td>" . array_key_exists('TheKey', $tempArr) . "</td>";
                        echo "<td>$Saifs</td>";
                        echo "<td>" . SaifChecksArrayKey('TheKey', $tempArr) . "</td>";
                        echo "</tr>";
                        break;
                    }
                default: {
                        if (SaifIsArray(call_user_func($phps, $inputs[$index]))) {
                            echo "<tr>";
                            echo "<td>" . $row++ . "</td>";
                            echo "<td>";
                            if (SaifIsArray($inputs[$index])) {
                                foreach ($inputs[$index] as $key => $item) {
                                    echo "[$key] => $item<br>";
                                }
                            } else {
                                echo $inputs[$index];
                            }
                            echo "</td>";
                            echo "<td>$phps</td>";
                            echo "<td>";
                            foreach (call_user_func($phps, $inputs[$index]) as $key => $item) {
                                echo "[$key] => $item<br>";
                            }
                            echo "</td>";
                            echo "<td>$Saifs</td>";
                            echo "<td>";
                            foreach (call_user_func($Saifs, $inputs[$index]) as $key => $item) {
                                echo "[$key] => $item<br>";
                            }
                            $index++;
                            echo "</td>";
                            echo "</tr>";
                        } else {
                            echo "<tr>";
                            echo "<td>" . $row++ . "</td>";
                            echo "<td>";
                            if (SaifIsArray($inputs[$index])) {
                                foreach ($inputs[$index] as $key => $item) {
                                    echo "[$key] => $item<br>";
                                }
                            } else {
                                echo $inputs[$index];
                            }
                            echo "</td>";
                            echo "<td>$phps</td>";
                            echo "<td>" . call_user_func($phps, $inputs[$index]) . "</td>";
                            echo "<td>$Saifs</td>";
                            echo "<td>" . call_user_func($Saifs, $inputs[$index]) . "</td>";
                            echo "</tr>";
                            $index++;
                        }
                        break;
                    }
            }
        }
        ?>
    </table>
</div>