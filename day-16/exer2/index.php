<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>

<body>

    <?php
    // file_put_contents('accounts.php',json_encode($accounts));
    ?>

    <div class="border border-2 border-primary container my-5 w-9 rounded-5 bg-light p-5">
        <h1 class="title"></h1>
        <form class="form" action="" method="post">

            <!-- <label for="name"></label><input type="text" name="name" id="name">
         <label for="age"></label><input type="number" name="age" id="age"> -->
            <label class="form-label" for="bankId">Your account number</label><input type="text" name="bankId" id="bankId" class="form-control">
            <label class="form-label" for="amount">Amount</label><input min="0" max="1000000" type="number" step="100" class="form-control" name="amount" id="amount">
            <center>

                <input type="submit" value="submit" name="submit" class=" mt-3  btn-lg btn btn-primary">
            </center>
        </form>
    </div>

    <?php
    function checkLimit(int $amount)
    {
        if ($amount > 1000000)
            throw new Exception("You can't withdraw more than million");
    }
    function checkBalance(int $amount, int $balance)
    {
        if ($amount > $balance)
            throw new Exception("You can't withdraw more than your balance. Your balance ($balance).");
    }
    function checkNegativity(int $amount)
    {
        if ($amount <= 0)
            throw new Exception("You must withdraw more than zero");
    }

    $currentAccount;
    function withdraw(int $amount, $account, int $accountID)
    {
        try {
            checkNegativity($amount);
            checkLimit($amount);
            checkBalance($amount, $account->balance);
            global $accounts;
            $account->balance -= $amount;
            $accounts[$accountID] = $account;
        } catch (Exception $e) {
            echo "Sorry, " . $account->name . " your withdraw is canceled because " . $e->getMessage();
    ?>
            <script>
                alert(<?= "Sorry, " . $account->name . " your withdraw is canceled because " . $e->getMessage() ?>);
            </script>
    <?php } finally {
            $currentAccount = null;
        }
    }
    if (isset($_POST['submit'])) {
        if (isset($_POST['amount']) && isset($_POST['bankId'])) {
            $accountID = (int) $_POST['bankId'];
            if (is_numeric($accountID)) {
                $x = file_get_contents("http://localhost/bootCamp/day-16/exer2/accounts.php?bankid=" . $accountID);
                $currentAccount = json_decode($x);
                withdraw($_POST['amount'], $currentAccount->accountDetails, $currentAccount->bankid);
            }
        }
    }

    ?>

</body>

</html>