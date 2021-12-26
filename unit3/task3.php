<html>
    <head>
        <title>title</title>
        <style>
            .diez{
                color:red;
                float: right;
            }
        </style>
    </head>
    <body>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <b>Введіть висоту:</b> <input type="text" name="height_tower" placeholder="1-15">
            <br>
            <input type="submit">
        </form>
        
        
        <?php
        $height_tower = 0;
        $msg = "";
        
        if (!(empty($_POST['height_tower']))){
            $height_tower = trim($_POST['height_tower']);
            
            $height_tower_pattern = "/^\d{1,2}$/";
            
            if(preg_match($height_tower_pattern, $height_tower) && ((int)$height_tower > 0) && ((int)$height_tower <= 15)){
                $height_tower = (int)$height_tower;
                
                for ($i=1;$i<=$height_tower;$i++){
                    echo str_repeat("<span class='diez'>#</span>",$i);
                    echo "<br>";
                }
            } else {
                $msg = "Введіть коректну висоту в межах 1-15 ";
            }
        }else{
            $msg = "Значення відсутнє чи некоректне";
        }
        echo "$msg";
        ?>
    </body>
</html>