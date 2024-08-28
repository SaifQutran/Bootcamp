<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignments</title>
    <style>
        input {
            margin: 10px;
            height: 60px;
            width: 100%;
            color: black;
            border-radius: 20px;

        }

        form {
            width: 50%;
            margin: 150px auto;
            display: flex;
            justify-content: center;
        }

        #submit {
            font-size: 20px;
            background-color: burlywood;
            font-weight: bolder;
        }

        #num {
            text-align: center;
            font-size: 20px;
            border: burlywood black 3px;
            background-color: azure;
        }

        h1 {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            color: darkgoldenrod;
            text-align: center;
        }
        div{
            width:100%;
        }
    </style>
</head>

<body>
<form action="">
        <div>
            <center>

                <input type="number" name="num" id="num" placeholder="Enter the number to find factorial">
                </br>
                <input type="submit" name="submit" id="submit" value="Submit">
            </center>
        </div>
    </form>
    <h1> <?php
            error_reporting(E_ERROR);

            $m = (int)$_REQUEST['num'];
            if ($m > 170)
                echo "The factorial of " . $m . " is infinite";
            else if($m == 0 )
                echo "";
            else if (!is_null($m) && is_int($m))
                echo "Factorial of " . $m . " = " . factorial($m);
            ?></h1>
</body>
<?php
function factorial(int $x)
{
    $result = 0;
    if ($x != 0) {
        $result = 1;
        for ($x; $x > 1; $x--) {
            $result *= $x;
        }
    }
    return $result;
}
?>

</html>