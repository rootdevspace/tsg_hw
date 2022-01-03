<?php
define("M", 10);
define("N", 18);

$arr = array(array());

for($i=0;$i<M;$i++){
    for($j=0;$j<N;$j++){
        $arr[$i][$j] = rand(1, 100);
    }
}


for($i=0;$i<M;$i++){
    echo '|';
    for($j=0;$j<N;$j++){
        $item = $arr[$i][$j];
        echo " $item |";
    }
    echo '<br>';
}
