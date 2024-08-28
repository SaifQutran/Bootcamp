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
    private string $PIN;
    private string $currency;
    private string $nameofOwner;
    public function getName()
    {
        return $this->nameofOwner;
    }
    private function setName($name)
    {
        return $this->nameofOwner = $name;
    }

    private int $balance;
    public function getBalance()
    {
        return $this->balance;
    }

    private bool $status;
    protected function getStatus()
    {
        return $this->status;
    }
    private string $creationDate;
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
    public function __destruct()
    {
        $this->balance = 0;
        echo "<br>$this->nameofOwner 's account is deleted.";
    }

    public function pauseAccount()
    {
        if (!$this->status)
            echo 'It is already paused';
        $this->status = false;
    }
    public function deposite(int $amount)
    {
        if ($this->status) {
            $this->balance += $amount;
            echo "<br/>" . $this->nameofOwner . " depoists $amount. The new balance is(" . $this->balance . ')';
        } else
            echo "<br/>" . "This Account is forbidden to access please visit the closest branch";
    }
    private function checkValidPIN(int $PIN)
    {
        if (strlen((string)$PIN) == 4) {
            return $PIN;
        } else return '0000';
    }
    public function __call($member, $arguments)
    {
        $numberOfArguments = count($arguments);

        if (method_exists($this, $function = $member . $numberOfArguments)) {
            call_user_func_array(array($this, $function), $arguments);
        }
    }
    public function __construct(string $accountNumber, string $name, int $balance, string $currency, int $PIN, bool $status = true)
    {
        $this->accountNumber = $accountNumber;
        $this->nameofOwner = $name;
        $this->balance = $balance;
        $this->currency = $currency;
        $this->status = $status;
        $this->PIN = $this->checkValidPIN($PIN);
        $this->creationDate = date('now');
    }
    protected function balanceMinus($amount)
    {
        $this->balance -= $amount;
    }
}
function count_instances($className)
{
    $i = 0;
    foreach ($GLOBALS as $key => $value) {
        if ('global' === $key)
            continue;
        if ('object' === gettype($value)) {
            if ($className === get_class($value))
                $i++;
        }
    }
    return $i;
}
class SavingAccount extends Account
{
    private float $interestRate;
    private int $withdrawLimit;
    public function getLimit(){
        return $this->withdrawLimit;
    }
    public function setLimit($withdrawLimit){
        $this->withdrawLimit = $withdrawLimit;
    }
    private function checkSavingLimit(int $amount)
    {
        if ($amount > $this->withdrawLimit)
            throw new Exception("You can't withdraw more than $this->withdrawLimit");
    }
    function __construct($accountNumber, $name, $balance,$cur)
    {
        parent::__construct($accountNumber, $name, $balance,$cur);
        if ($balance > 10000000)
            $this->interestRate = 1.1;
        else if ($balance > 1000000)
            $this->interestRate = 1.07;
        else if ($balance > 100000)
            $this->interestRate = 1.03;
        else
            $this->interestRate = 1.02;
    }
    public function getRate()
    {
        return $this->interestRate;
    }
    public function withdraw($amount)
    {
        if ($this->getStatus()) {

            try {
                checkNegativity($amount);
                $this->checkSavingLimit($amount);
                checkLimit($amount);
                checkBalance($amount, $this->getBalance());
                $this->balanceMinus($amount);
                echo "<br/>" . $this->getName() . " withdraws $amount. The new balance is(" . $this->getBalance() . ')';
            } catch (Exception $th) {
                echo "<br/>" . "Sorry, " . $this->getName() . " your withdraw is canceled because " . $th->getMessage();
            }
        } else
            echo "<br/>" . "This Account is forbidden to access please visit the closest branch";
    }
}
class ChcekAccount extends Account
{
    
}

function test()
{
    $firstAccount = new Account(count_instances('Account') + 1, 'Ahmed', 21000, 'USD', 2141);
}
test();
echo count_instances('Account');
