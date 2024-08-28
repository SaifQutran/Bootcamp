<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        tr:nth-child(1),
        td:nth-child(1) {
            background-color: grey;
            padding-left: 10px;
        }

        th {
            text-align: left;
            font-size: 24px;
            padding: 10px;
        }


        td {
            padding: 2px;
            font-size: 22px;
        }



        h1 {
            text-align: center;
            font-size: 26px;
        }

        table {
            margin: 0px auto;
        }

        .city {
            width: 100%;
        }
    </style>
</head>
<?php

$cities = [
    "Seyiun" => fillIt(),
    "Mecca" => fillIt(),
    "London" => fillIt(),
    "Berlin" => fillIt(),
    "Baghdad" => fillIt(),
    "New York" => fillIt(),
    "Tokyo" => fillIt()
];



// function fillIt()
// {

//     $daysOfWeek = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];

//     foreach ($daysOfWeek as $day) {
//         $weekTemperatures[$day] = array_map(function () {
//             return rand(15, 50);
//         }, range(1, 12));
//     }
//     return $weekTemperatures;
// }
function fillIt()
{
    $daysOfWeek = ["Saturday", "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];
    $weatherStates = ["Clear" => 'fa-solid fa-sun', "Clouds" => 'fa-solid fa-cloud', "Rain" => 'fa-solid fa-cloud-rain', "Fog" => 'fa-solid fa-tornado', "Snow" => 'fa-solid fa-snowflake', "Thunderstorm" => 'fa-solid fa-wind'];
    foreach ($daysOfWeek as $day) {
        $randKey = array_rand($weatherStates);
        $weekTemperatures[$day] = [
            'temperatures' => array_map(function () {
                return rand(15, 50);
            }, range(1, 24)),
            $randKey => $weatherStates[$randKey],
            'pressure' => rand(100, 1050),
            'humidity' => rand(20, 80),
        ];
    }
    return $weekTemperatures;
}

?>
<?php
session_start();
foreach ($cities as $city => $weekTempretures) {
    $_SESSION['my_array'] = $cities[$city];
?>
    <div class="city">
        <?php  ?>
        <h1><a href="city.php?name=<?= urlencode($city) ?>"><?= $city ?></a></h1>
        <table cellspacing='0'>
            <tr>
                <th>
                    
                    day
                </th>
                <th>
                    Minimum tempreture
                </th>
                <th>
                    Maximum tempreture
                </th>
                <th>
                    Weather State
                </th>
            </tr>

            <?php
            foreach ($weekTempretures as $day => $tempsThroughDay) {
                echo "<tr>";
                echo "<td>$day</td>";
                $min = min($tempsThroughDay['temperatures']);
                $max = max($tempsThroughDay['temperatures']);
                $colorCold = $min < 17 ? 'skyblue' : 'white';
                $colorHot = $max > 48 ? 'pink' : 'white';
                echo "<td style='background-color:" . $colorCold  . ";'>" . $min . "</td>";
                echo "<td style='background-color:" . $colorHot  . ";'>" . $max . "</td>";
                echo "<td><i class='" . $tempsThroughDay[array_keys($tempsThroughDay)[1]] . "'</td>";
            } ?>
        </table>
    </div>
<?php

}
?>