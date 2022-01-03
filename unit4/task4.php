<html>
<head>
    <title>Форма</title>
    <meta charset="UTF-8">
</head>
<body>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <p><b>Введіть ваш текст:</b></p>
    <p><textarea rows="10" cols="45" name="textarea" placeholder="">груша яблоко слива персик вишня черешня ягода смородина часник цибуля картопля морква буряк фасоля</textarea></p>
    <input type="submit">
</form>
<?php
if (!empty($_POST['textarea'])) {
    $msg = "";
    $textarea = $_POST['textarea'];
    
    $str1 = trim($textarea);
    $str2 = preg_replace('/\s{2,}/', ' ', $str1);
    
    
    $array = preg_split('/(\s)/', $str2);
    $array = array_diff($array, array(''));
    
    
    $str_length = 0;
    $sum = 0;

    for($i=0;$i<count($array);$i++){
        $str_length += mb_strlen($array[$i]);
    }
    
    $str_length += count($array)-1;

    $i=0;
    while($i<count($array)){
        
        if(mb_strlen($array[$i]) < 40){
            
            $sum += mb_strlen($array[$i]." ");
        
            if($sum < 40){                
                echo "$array[$i] ";
                $i++;                
            }
            if($sum == 40){
                echo "$array[$i]<br>";
                $sum = 0;
                $i++;               
            }
            if($sum > 40){                
                $el = $array[$i];
                echo "<br>$el ";
                $sum = 0;
                $i++;
            }
        }else{
            $msg = "$array[$i] більше 40 символів";
            break;
        }        
    }   
    echo "<br>$msg";
}
?>

</body>
</html>