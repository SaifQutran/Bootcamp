<table border="2">
    <?php addEmployee("Saif"); ?>
    <?php addEmployee("Ali"); ?>
    <?php addEmployee("Hisham"); ?>
    <?php addEmployee("Esa"); ?>
    <?php addEmployee("Tawfiq"); ?>
    <?php addEmployee("Salem"); ?>
    <?php addEmployee("Alawi"); ?>
</table>
<?php addTask('Buy grocery', false) ?>
<?php addTask('write the essay', true) ?>
<?php addTask('Do exercise', true) ?>
<?php addTask('Fix the air conditioner', false) ?>
<?php calculateSalary('Ahmed'); ?>
<?php echo "<br>"; ?>
<?php calculateSalary('Salem'); ?>
<?php echo "<br>"; ?>
<?php calculateSalary('Awad'); ?>
<?php echo "<br>"; ?>
<?php
function addEmployee(string $name)
{
    echo "<tr><td>$name</td></tr>";
}
function addTask(string $task, bool $isCompleted)
{
    if ($isCompleted)
        echo "<p><input type='checkbox' disabled checked>$task<p>";
    else
        echo "<p><input type='checkbox'>$task<p>";
}

function getExtra(int $extraHours)
{
    return $extraHours * 30;
}
function getDiscount(int $absenceDays)
{
    return $absenceDays * 200;
}
function getTax(int $sal, float $taxRatio)
{
    return $sal * $taxRatio;
}

function calculateSalary(string $empName)
{
    $Emps =
        [
            'Ahmed' => array(
                'monthlySal' => 2000,
                'extraTime' => 20,
                'absence' => 3,
                'tax' => 0.09
            ),
            'Salem' => array(
                'monthlySal' => 1600,
                'extraTime' => 24,
                'absence' => 1,
                'tax' => 0.12
            ),
            'Awad' => array(
                'monthlySal' => 2200,
                'extraTime' => 10,
                'absence' => 0,
                'tax' => 0.07
            ),
        ];
    $sal = $Emps[$empName]['monthlySal'] + getExtra($Emps[$empName]['extraTime']) - getDiscount($Emps[$empName]['absence']) - getTax($Emps[$empName]['monthlySal'], $Emps[$empName]['tax']);
    echo "The salary of $empName = $sal";
}
?>