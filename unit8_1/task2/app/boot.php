<?php

require ROOT . '/app/Autoloader.php';
Autoloader::register();

use Classes\Employee;

$employee1 = new Employee;
$employee1->setName('Alexa');
$employee1->setAge(14);
$employee1->setGender('male');
$employee1->setSalary(14000.99);

$employee2 = new Employee;
$employee2->setName('Simona');
$employee2->setAge(16);
$employee2->setGender('female');
$employee2->setSalary(12000.79);

$employees = [$employee1, $employee2];

foreach ($employees as $empl) {
    echo '<b>New employee</b><br>';
    echo 'Name: ' . $empl->getName() . '<br>';
    echo 'Age: ' . $empl->getAge() . '<br>';
    echo 'Gender: ' . $empl->getGender() . '<br>';
    echo 'Salary: ' . $empl->getSalary() . '<br>';
    echo '<br>';
}