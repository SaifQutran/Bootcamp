<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignments</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.2.3/css/flag-icons.min.css" />
    <style>
        table:before {
            content: "";
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 1;
            background-color: white;
            background-image: url('albaath-logo-hd.webp');
            background-repeat: no-repeat;
            background-size: contain;
            background-position: center;
            opacity: 0.2;
        }

        table {

            margin: 10px auto;
            width: 80%;

        }

        td,
        th {
            font-family: 'cairo';
            text-align: left;
            font-size: 18px;

        }


        td:nth-child(1),
        th:nth-child(1) {
            padding-left: 5px;
            font-weight: bold;
        }

        td:nth-child(3),
        th:nth-child(3) {
            text-align: right;
            padding-right: 5px;
        }

        .dark {
            border-top: solid 2px cadetblue;
            border-bottom: solid 1px cadetblue;
            background-color: rgba(137, 207, 235, 0.5);
            ;
        }

        .light {
            background-color: rgba(red, green, blue, 0.5);

        }

        i {
            border-radius: 2px;
        }

        .flag {
            font-size: 25px;
        }
    </style>
</head>
<?php
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
$arabic_countries_full_names = [
    "Algeria" => "الجمهورية الجزائرية الديمقراطية الشعبية",
    "Bahrain" => "مملكة البحرين",
    "Comoros" => "الاتحاد القمري",
    "Djibouti" => "جمهورية جيبوتي",
    "Egypt" => "جمهورية مصر العربية",
    "Iraq" => "جمهورية العراق",
    "Jordan" => "المملكة الأردنية الهاشمية",
    "Kuwait" => "دولة الكويت",
    "Lebanon" => "الجمهورية اللبنانية",
    "Libya" => "دولة ليبيا",
    "Mauritania" => "الجمهورية الإسلامية الموريتانية",
    "Morocco" => "المملكة المغربية",
    "Oman" => "سلطنة عمان",
    "Palestine" => "دولة فلسطين",
    "Qatar" => "دولة قطر",
    "Saudi Arabia" => "المملكة العربية السعودية",
    "Somalia" => "جمهورية الصومال",
    "Sudan" => "جمهورية السودان",
    "Syria" => "الجمهورية العربية السورية",
    "Tunisia" => "الجمهورية التونسية",
    "United Arab Emirates" => "دولة الإمارات العربية المتحدة",
    "Yemen" => "الجمهورية اليمنية"
];

?>

<body>

    <table cellspacing="0">
        <tr class="white">
            <th>#</th>
            <th>English Name</th>
            <th>الاسم بالعربية</th>
            <th>Flag</th>
        </tr>
        <?php
        $i = 0;
        foreach ($arabic_countries_abbreviations as $key => $item) {
            if ($i % 2 == 0)
                echo "<tr class='dark'>";
            else
                echo "<tr class='light'>";


            echo "<td>" . $i + 1 . "</td> <td>$key</td><td class='arabicName'>$arabic_countries_full_names[$key]</td><td><i class='flag fi fi-" . $item . "'></i></td>";
            $i++;
        }
        ?>
    </table>
</body>

</html>