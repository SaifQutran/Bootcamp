<?php
class Employee {
    public static $idCounter=0;
    private $id;
    protected int $workDays;
    private int $absenace;
    public function __construct(int $workDays){
        $this->id = ++Employee::$idCounter;
        $this->workDays = $workDays;
    }
    public function getSalary(){}
}
final class hourlyEmployee extends Employee {
    private float $byHour;
    private int $HoursInDay;
    public function getSalary(){
        return $this->HoursInDay * $this->workDays * 4 * $this->byHour;
    }
    
    
}
class monthlyEmployee extends Employee {

}
final class contractEmployee extends monthlyEmployee {}
