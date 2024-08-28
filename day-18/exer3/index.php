<?php class DivideByZero extends Exception
{
    //public function getMessage(): string{}
    // getMessage cannot be overriden because it is final
    private $divider;
    public function getDivider()
    {
        return $this->divider;
    }
    public function __construct($divider, string $message = "You can't Devide by zero", int $code = 0, Throwable $previous = null)
    {
        $this->divider = $divider;
        $this->message = $message;
        echo $message . " The divider = $divider.<br>";
    }
}
function divide($a, $b)
{
    if ($b == 0)
        throw new DivideByZero($a);
    else
        echo $a / $b;
}
try {
    
    divide(9, 0);
} catch (Exception $th) {
    echo "The exception is catched";
}
