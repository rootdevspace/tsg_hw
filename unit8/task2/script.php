<?php
class Calculator{
    
    public function addition(float $valA, float $valB) {
        echo "<b>Додавання:</b> $valA + $valB = " . ($valA+$valB) . '<br>';
    }
    
    public function subtraction(float $valA, float $valB){
        echo "<b>Віднімання:</b> $valA - $valB = " . ($valA-$valB) . '<br>';
    }
    
    public function multiplication(float $valA, float $valB) {
        echo "<b>Множення:</b> $valA * $valB = " . ($valA*$valB) . '<br>';
    }
    
    public function division(float $valA, float $valB) {
        if($valB > 0 || $valB < 0){
            echo "<b>Ділення:</b> $valA / $valB = " . round(($valA/$valB), 4) . '<br>';
        }else{
            echo "<b>Ділення:</b> $valA / $valB = <b>Неможливо поділити на 0!!!</b>";
        }
    }
    
}

$calculator = new Calculator();
$calculator->addition(1.2, 0.6);
$calculator->subtraction(9, 7);
$calculator->multiplication(1.2, 5);
$calculator->division(30, 0);    
?>