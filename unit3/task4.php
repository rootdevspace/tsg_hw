<html>
    <head>
        <title>Task4</title>
        <style>
            body{
                line-height: 1.5rem;
            }
            .red_row{
                height: 20px;
                background-color: red;
                float: left;
                margin-right: 5px;  
            }
        </style>
    </head>
    <body>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <b>Введіть числа:</b> <input type="text" name="numbers" placeholder="1,2,3,4...100">
            <br>
            <input type="submit">
        </form>
        
        
        <?php
        
        $msg = "";
        $numbers = "";
        $Ok = true;
        
        if (!(empty($_POST['numbers']))){
            $numbers = trim($_POST['numbers']);
            
            
            $numbers_pattern_1 = '/^[^\,\s0\;\:][\d\,?]*[^\,\s\;\:]$/';//1,2,3,...,100
            $numbers_pattern_2 = '/\,{2,}/';
            $numbers_pattern_3 = '/^[^\,\s0\;\:][\d\,?]*$/';//1-9, or 1-9
            
            if(preg_match($numbers_pattern_1, $numbers)===1 && preg_match($numbers_pattern_2, $numbers)===0){
                
                $arr_strs = explode(',', $numbers);
                
                for($i=0;$i<count($arr_strs);$i++){
                    if($Ok){
                        if(((int)$arr_strs[$i]) >= 1 && ((int)$arr_strs[$i]) <= 100){
                            $Ok = true;
                        } else {
                            $Ok = false;
                        }
                    } else {
                        break;
                    }
                }
                
                if($Ok){
                    for($i=0;$i<count($arr_strs);$i++){
                        $line_number = $i+1;
                        $current_number = (int)$arr_strs[$i];
                        echo "<div><div style='float:left;'>$line_number.&nbsp;</div><div class='red_row' style='width: $current_number;'></div><span>$current_number</span></div>";
                    }
                } else {
                    $msg = "Присутнє число поза діапазоном 1 - 100";
                }
            }elseif(preg_match($numbers_pattern_3, $numbers)===1 && preg_match($numbers_pattern_2, $numbers)===0){
                
                $arr_strs_2 = explode(',', $numbers);
                
                
                $number = (int)$arr_strs_2[0];
                if(((int)$arr_strs_2[0]) >= 1 && ((int)$arr_strs_2[0]) <= 100){
                echo "<div><div style='float:left;'>1.&nbsp;</div><div class='red_row' style='width: $number;'></div><span>$arr_strs_2[0]</span></div>";
                } else {
                    $msg = "Присутнє число поза діапазоном 1 - 100";
                }
                
            }else {
                $msg = "Введіть посліднвність чисел, яка буде в діапазоні 1 - 100 (напр. 1,2,3,4)";
            }
        }else{
            $msg = "Значення відсутнє чи некоректне";
        }
        echo "$msg";
        ?>
    </body>
</html>