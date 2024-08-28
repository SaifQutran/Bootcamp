<?php
session_start();
if (!is_array($_SESSION['prod'])) {
    session_unset();
    $_SESSION['prod'] = [];
}
// var_dump($_SESSION['prod']);
// $products =
//     [
//         'headphone' => 2500,
//         'mobile' => 20000,
//         'laptop' => 25000,
//         'Smart watch' => 5000,
//         'PC' => 45000,
//         'Screen protector' => 800,
//         'Mobile Cover' => 1200
//     ];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="bootstrap.css">
</head>
<script>

</script>

<?php if (isset($_POST['add'])) {
    if (isset($_POST['product'])&& $_POST['product']!="" ) {
        $_SESSION['prod'][count($_SESSION['prod'])] = array($_POST['product'], $_POST['price']);
        $_POST['product'] = "";
        // echo "test";
    }
}
if (isset($_POST['Clear'])) {
    $_SESSION['prod'] = [];
}
if (isset($_POST['delete'])) {
    // unsset $_SESSION['prod'] = [];
    unset($_SESSION['prod'][$_POST['delete']]);
    reset($_SESSION['prod']);
}

?>

<body>
    <form method="post" action="#">

        <table class="table table-striped">
            <tr>
                <th>#</th>
                <th>Product</th>
                <th>Price</th>
                <th><input type="submit" value="Delete All" name="Clear" class="btn btn-lg btn-danger"></th>
            </tr>
            <?php
            $index = 1;
            foreach ($_SESSION['prod'] as $product) {
            ?>
                <tr>
                    <td><?= $index++ ?></td>
                    <td><?= $product[0] ?></td>
                    <td><?= $product[1] ?>$</td>
                    <td><button name="delete" value="<?=$index -2 ?>" type='submit' class="btn btn-warning">Delete</button></td>
                </tr>
            <?php } ?>
            <tr>
                <td></td>
                <td><input type="text" name="product" class="form-control"></td>
                <td><input type="number" name="price" class="form-control"></td>
                <td>

                    <input type="submit" value="Add" name="add" class="btn btn-primary">
                </td>
            </tr>

        </table>
        <center>
                <a href="cart.php" class="btn btn-success">Go to the cart</a>
        </center>
    </form>
    
    

</body>

</html>