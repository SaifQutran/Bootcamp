<?php
class Employee implements \JsonSerializable
{
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
    const tax = 0.12;
    private string $name;
    public function getName()
    {
        return $this->name;
    }

    public static $idCounter = 0;
    private $id;
    protected int $workDays;
    private int $absence;
    private int $age;
    private string $title;

    public function getAge()
    {
        return $this->age;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function setTitle(string $title)
    {
        $this->title = $title;
    }
    public function getAbsence()
    {
        return $this->absence;
    }
    public function addAbsence()
    {
        $this->absence++;
    }
    public function __construct(string $name,int $workDays, int $age, string $title)
    {
        $this->id = ++Employee::$idCounter;
        $this->workDays = $workDays;
        $this->name = $name;
        $this->age = $age;
        $this->title = $title;
        $this->absence = 0;
    }

    public function getSalary() {}
}
final class hourlyEmployee extends Employee implements \JsonSerializable
{
    public function jsonSerialize()
    {
        $vars = [];

        // Get properties of the current class
        $reflection = new \ReflectionClass($this);
        foreach ($reflection->getProperties() as $property) {
            $property->setAccessible(true);
            $vars[$property->getName()] = $property->getValue($this);
        }

        // Get properties of the parent class
        $parentReflection = $reflection->getParentClass();
        if ($parentReflection) {
            foreach ($parentReflection->getProperties() as $property) {
                $property->setAccessible(true);
                $vars[$property->getName()] = $property->getValue($this);
            }
        }

        return $vars;
    }
    private float $byHour;
    private int $HoursInDay;
    public function setHours($hours)
    {
        $this->HoursInDay = $hours;
    }
    public function getHours()
    {
        return $this->HoursInDay;
    }
    public function setSalaryByHour($byHour)
    {
        $this->byHour = $byHour;
    }
    public function getSalaryByHour()
    {
        return $this->byHour;
    }
    public function __construct(int $hours, float $byHour,string $name, int $workDays, int $age, string $title)
    {
        Parent::__construct($name,$workDays, $age, $title);
        $this->byHour = $byHour;
        $this->HoursInDay = $hours;
    }

    public function getSalary()
    {
        $temp = $this->HoursInDay * $this->workDays * 4 * $this->byHour;
        return $temp - $this->getAbsence() * 0.07 * $temp - parent::tax * $temp;
    }
}
class monthlyEmployee extends Employee
implements \JsonSerializable
{
    public function jsonSerialize()
    {
        $vars = [];

        // Get properties of the current class
        $reflection = new \ReflectionClass($this);
        foreach ($reflection->getProperties() as $property) {
            $property->setAccessible(true);
            $vars[$property->getName()] = $property->getValue($this);
        }

        // Get properties of the parent class
        $parentReflection = $reflection->getParentClass();
        if ($parentReflection) {
            foreach ($parentReflection->getProperties() as $property) {
                $property->setAccessible(true);
                $vars[$property->getName()] = $property->getValue($this);
            }
        }

        return $vars;
    }
    private float $monthlySalary;

    public function setMonthlySalary($monthlySalary)
    {
        $this->monthlySalary = $monthlySalary;
    }
    public function getMonthlySalary()
    {
        return $this->monthlySalary;
    }
    function __construct(float$monthlySalary, string $name, int $workDays, int $age, string $title)
    {
        parent::__construct($name,$workDays, $age, $title);
        $this->monthlySalary = $monthlySalary;
    }
    public function getSalary()
    {
        $temp = $this->monthlySalary;
        return $temp - $this->getAbsence() * 0.07 * $temp - parent::tax * $temp;
    }
}
final class contractEmployee extends monthlyEmployee
implements \JsonSerializable
{
    public function jsonSerialize()
    {
        $vars = [];

        // Get properties of the current class
        $reflection = new \ReflectionClass($this);
        foreach ($reflection->getProperties() as $property) {
            $property->setAccessible(true);
            $vars[$property->getName()] = $property->getValue($this);
        }

        // Get properties of the parent class
        $parentReflection = $reflection->getParentClass();
        if ($parentReflection) {
            foreach ($parentReflection->getProperties() as $property) {
                $property->setAccessible(true);
                $vars[$property->getName()] = $property->getValue($this);
            }
        }

        return $vars;
    }
    
    private string $ensuranceType;
    function __construct(string $ensuranceType, float$monthlySalary, string $name, int $workDays, int $age, string $title)
    {
        parent::__construct($name,$monthlySalary, $workDays, $age, $title);
        $this->ensuranceType = $ensuranceType;
    }
    public function setEnsuranceType($ensuranceType)
    {
        $this->ensuranceType = $ensuranceType;
    }
    public function getEnsuranceType()
    {
        return $this->ensuranceType;
    }
    function getRemainengYears()
    {
        return 62 - $this->getAge();
    }
    function getRetirementSalary()
    {
        $temp = $this->getMonthlySalary();
        return $temp -  0.85 * $temp - parent::tax * $temp;
    }
}

function test()
{
    $e1 = new contractEmployee('ali','gold', 1000, 3, 45, 'seo');
    $e2 = new monthlyEmployee(800,'salem', 5, 24, 'Secrtary');
    file_put_contents('data.php', json_encode(array($e1, $e2)));
}
test();
