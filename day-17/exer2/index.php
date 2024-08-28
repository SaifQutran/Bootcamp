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

class Account
{
    private string $accountNumber;
    private string $currency;
    private string $nameofOwner;

    private int $balance;
    private bool $status;
    public function withdraw($amount)
    {
        if ($this->status) {

            try {
                checkNegativity($amount);
                checkLimit($amount);
                checkBalance($amount, $this->balance);
                $this->balance -= $amount;
                echo "<br/>" . $this->nameofOwner . " withdraws $amount. The new balance is(" . $this->balance . ')';
            } catch (Exception $th) {
                echo "<br/>" . "Sorry, " . $this->nameofOwner . " your withdraw is canceled because " . $th->getMessage();
            }
        } else
            echo "<br/>" . "This Account is forbidden to access please visit the closest branch";
    }
    public function deposite(int $amount)
    {
        if ($this->status) {
            $this->balance += $amount;
            echo "<br/>" . $this->nameofOwner . " depoists $amount. The new balance is(" . $this->balance . ')';
        } else
            echo "<br/>" . "This Account is forbidden to access please visit the closest branch";
    }
    public function __call($member, $arguments)
    {
        $numberOfArguments = count($arguments);

        if (method_exists($this, $function = $member . $numberOfArguments)) {
            call_user_func_array(array($this, $function), $arguments);
        }
    }
    public function __construct(string $accountNumber, string $name, int $balance, string $currency, bool $status = true)
    {
        $this->accountNumber = $accountNumber;
        $this->nameofOwner = $name;
        $this->balance = $balance;
        $this->currency = $currency;
        $this->status = $status;
    }
}
$accounts = [
    new Account('12', "Saif Qutran", 202010, "YR"),
    new Account('13', "Salem Ali", 39210, "SR"),
    new Account('14', "Leonel Messi", 23109, "USD", false),
    new Account('15', "Selena Gomez", 31000, "USD")
];

$accounts[0]->withdraw(10000);
$accounts[2]->withdraw(10000);
$accounts[2]->deposite(10000);
$accounts[3]->deposite(1040);
