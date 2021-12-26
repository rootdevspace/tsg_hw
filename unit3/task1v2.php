<html>
<head>
    <title>Задача 1</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/task1_style.css">
</head>
<body>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <b>Тип пального:</b>
    <select name="fuel">
        <option value="fuel_type">Виберіть пальне</option>
        <option value="diesel">diesel</option>
        <option value="benzin">benzin</option>
    </select>
    <br>
    <b>Об’єм двигуна (куб. см):</b> <input type="text" name="engine_capacity" placeholder="напр. 1000">
    <br>
    <b>Рік випуску автомобіля:</b> <input type="text" name="year_of_manufacture" placeholder="напр. 1970-<?= date('Y', time())?>">
    <br>
    <b>Вартість автомобіля:</b> <input type="text" name="car_cost" placeholder="напр. 9999.99">
    <br>
    <input type="submit">
</form>
<?php
$msg = "";


if (!(empty($_POST['engine_capacity']) && empty($_POST['year_of_manufacture']) && empty($_POST['car_cost'])) && isset($_POST['fuel']) && ($_POST['fuel']!= 'fuel_type')) {
    $engine_capacity = trim($_POST['engine_capacity']);
    $year_of_manufacture = trim($_POST['year_of_manufacture']);
    $car_cost = trim(str_replace(',', '.', $_POST['car_cost']));
    $fuel = $_POST['fuel'];
    $base_rate = 0.00;
    $k_engine = 0.00;
    $k_age = 0;
    $Ok = false;
    
    $engine_capacity_pattern = '/^\d{1,5}$/';
                                                                                                        //max 10 litres
    if(preg_match($engine_capacity_pattern, $engine_capacity) && ((int)$engine_capacity > 0) && ((int)$engine_capacity <=10000)){
        $engine_capacity = (int)$engine_capacity;
        $Ok = true;
    }
    else{
        $msg = "$engine_capacity (<b>Error - Ведіть ціле число об'єму більше за нуль</b>)"; 
        $Ok = false;
    }
        
    $year_of_manufacture_pattern = '/^\d{4}$/';
    
    if(preg_match($year_of_manufacture_pattern, $year_of_manufacture) && ((int)$year_of_manufacture >= 1970) && ((int)$year_of_manufacture <= (int)date('Y', time()))){
        $year_of_manufacture = (int)$year_of_manufacture;
        $Ok = true;
    } else {
        $msg = "$year_of_manufacture (<b>Error - Ведіть рік випуску починаючи з 1970 по ".date('Y', time())."</b>)";
        $Ok = false; 
    }
    
    $car_cost_pattern = '/^\d*\.\d{2}$/';
    
    if(preg_match($car_cost_pattern, $car_cost) && ((int)$car_cost >= 0)){
        $car_cost = (float)$car_cost;
        $Ok = true;
    } else {
        $msg = "$car_cost (<b>Введіть коректну ціну</b>)";
        $Ok = false;
    }
    
    echo "Ви ввели: <br> Тип пального: $fuel; <br> Об’єм двигуна: $engine_capacity; <br> Рік випуску автомобіля: $year_of_manufacture; <br> Вартість автомобіля: $car_cost;";
    
    if($Ok){
        $base_rate = ($fuel == 'diesel') ? $base_rate = 75.00 : $base_rate = 50.00;
        $k_engine = $engine_capacity/1000;
        $k_age = (((int)date('Y', time())-$year_of_manufacture)>1) ? $k_age = ((int)date('Y', time())-$year_of_manufacture) : 1;
        $akciz_rate = round($base_rate*$k_engine*$k_age, 2);
        $full_car_cost = $car_cost + $akciz_rate;

        echo '<br>';
        echo '<br>';
        echo 'Ви отримали:';
        echo '<br>';
        echo "Ставка (акцизу) = $akciz_rate";
        echo '<br>';
        echo "Вартість автомобіля із урахуванням акцизу = $full_car_cost";
    } else {
        $msg .= "<br>Error при розрахунку акцизу";
    }
} else {
    $msg = "Error - незаповнені(некоректні) поля чи не вибрано тип пального";
}

echo "<b><br><br>$msg</b>";
?>
</body>
</html>