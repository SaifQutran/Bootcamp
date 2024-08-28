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

        .warn {
            color: red;
            text-align: left;

        }

        .unValid {
            border: red solid 3px;
            background-color: pink;
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

        #username,
        #password {
            text-align: center;
            font-size: 20px;
            border: burlywood solid 3px;
            background-color: azure;
        }

        h1 {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            color: darkgoldenrod;
            text-align: left;
        }


        div {
            width: 100%;
        }
    </style>
</head>
<?php
error_reporting(E_ERROR);
$hasChars = 0;
$hasNums = 0;
$hasSyms = 0;
function checkPassword()
{
    $p = $_REQUEST['password'];
    if (strlen($p) >= 8) {

        for ($i = 0; $i < strlen($p); $i++) {
            if (is_numeric($p[$i]))
                $GLOBALS['hasNums']++;

            else if (ctype_alpha($p[$i]))
                $GLOBALS['hasChars']++;
            else
                $GLOBALS['hasSyms']++;


            if ($GLOBALS['hasNums'] >= 3 && $GLOBALS['hasChars'] >= 4 && $GLOBALS['hasSyms'] >= 2)
                return true;
        }
    }
    echo strlen($p) >= 8 ? "<p style='color:green'>The password should be at least 8 characters</p>" : "<p style='color:red'>The password should be at least 8 characters</p>";
    echo $GLOBALS['hasNums'] >= 3 ? "<p style='color:green'> 3 Numbers</p>" : "<p style='color:red'> 3 Numbers</p>";
    echo $GLOBALS['hasChars'] >= 4 ? "<p style='color:green'> 4 Letters</p>" : "<p style='color:red'> 4 Letters</p>";
    echo $GLOBALS['hasSyms'] >= 3 ? "<p style='color:green'>  2 Symbols </p>" : "<p style='color:red'> 2 Symbols</p>";
    return false;
}

function sortByLeng($a, $b)
{
    return  strlen($a) -
        strlen($b);
}


function sortByLength($txt)
{
    // write your code here
    $array = explode(" ", $txt);
    usort($array, 'sortByLeng');
    return implode(" ", $array);
}
echo sortByLength("Get in the boat");
function checkUsername()
{
    $p = str_word_count($_REQUEST['username']);
    if ($p >= 4) {
        return true;
    }
    return false;
}
function isValid()
{
    if (checkUsername() && checkPassword())
        return true;
    else
        return false;
}
?>

<body>
    <form action="">
        <div>
            <center>

                <input type="text" name="password" id="password" placeholder="Password">
                <p><?php checkPassword() ?></p>
                </br>
                <input type="text" name="username" id="username" placeholder="Username" <?php checkUsername() ? "" : "class='unValid'"; ?>>
                <p class="warn"><?php echo checkUsername() ? '' : 'The username should be 4 words'; ?></p>
                </br>
                <input type="submit" name="submit" id="submit" value="Submit">
            </center>
        </div>
    </form>
    <h1><?php
        echo isValid() ?
            "Name :" . $_REQUEST['username'] . "</br>" .
            "Password :" . $_REQUEST['password'] :
            '';
        ?></h1>

</body>

</html>