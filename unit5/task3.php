<html>
<head>
    <title>Форма</title>
    <meta charset="UTF-8">
</head>
<body>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    Введіть список цілих чисел(через кому) : <input type="text" name="numbers" placeholder="1,2,3,4,5..."><br>
    <input type="submit">
</form>
<?php
$msg = "";
if (!empty($_POST['numbers'])) {
    $numbers = preg_replace('/\s+/', '', $_POST['numbers']);
    
    $last_coma = mb_strrpos($numbers, ',');
    if($last_coma !== false && $last_coma == ((mb_strlen($numbers))-1)){
        $numbers = rtrim($numbers, ',');
    }

    if(preg_match('/([0-9]+\,)+/', $numbers) === 1 && preg_match('/[a-zA-Zа-яА-Я_\.\;\:]+/u', $numbers) === 0){
        $numbers_arr = explode(',', $numbers);
        
        echo 'Ви ввели: ';
        foreach($numbers_arr as $k => $v){
            echo "<b>$v</b> ";
        }
        echo '<br><br>';
        
//        echo "<pre>";
//        var_dump($numbers_arr);
//        echo "</pre>";
        
        echo "Сума: ".customSuma($numbers_arr);
        echo '<br>';
        echo "Середнє значення: ".serednieZnachennia($numbers_arr);
        echo '<br>';
        echo "Кількість парних чисел: ".kilkistParnykhChysel($numbers_arr);
        echo '<br>';
        echo "Всі непарні числа: ".neparniChysla($numbers_arr);
    }else{
        $msg = "Введіть список цілих чисел(через кому)!";
    }
} else {
    $msg = "Ви не ввели список цілих чисел!";
}
echo $msg;

function customSuma($arr){
    $suma = 0;
    foreach ($arr as $k => $v){
        $suma += ((int)$v);
    }
    return $suma;
}

function serednieZnachennia($arr){
    return round(customSuma($arr)/count($arr), 2);
}

function kilkistParnykhChysel($arr){
    $z = 0;
    foreach ($arr as $k => $v){
        if(((int)$v)%2==0){
            $z++;
        }
    }
    return $z;
}

function neparniChysla($arr){
    $arr_inner = [];
    $i = 0;
    foreach ($arr as $k => $v){
        $val = (int)$v;
        if(($val)%2!=0){
            $arr_inner[$i] = $val;
            $i++;
        }
    }
    return implode(', ', $arr_inner);
}
?>

</body>
</html>