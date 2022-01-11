<?php

//1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144, 233, 377, 610, 987, 1597, 2584, 4181, 6765

echo "Числа Фібоначі - 1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144, 233, 377, 610, 987, 1597, 2584, 4181, 6765...";
echo "<br><br>";

function fibonachi($i) { 
    if ($i == 0 ) return 0; 
    if ($i <= 2) return 1;
    else return fibonachi($i - 1) + fibonachi($i -2); 
} 

function f_1($val){
    for($i=1;$i<$val+1;$i++){
        $x = fibonachi($i);
        if($i==20) echo "| $x |";
        else echo "| $x ";
    }
}

echo 'Варіант 1(Рекурсія):<br>';
f_1(20);

echo "<br><br>";

echo 'Варіант 2:<br>';
f_2(20);

function f_2($val_inner) {
    $sum = 0;
    $cur = 1;
    $prev = -1;

    for ($i = 0; $i < $val_inner + 1; $i++) {

        $sum = $cur + $prev;
        $prev = $cur;
        $cur = $sum;

        if ($sum == 0)
            continue;

        if ($i == $val_inner )
            echo "| $cur |";
        else
            echo "| $cur ";
    }
}
?>