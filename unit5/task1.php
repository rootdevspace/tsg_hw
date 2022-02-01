<html>
<head>
    <title>Форма</title>
    <meta charset="UTF-8">
</head>
<body>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <p><b>Введіть ваш текст:</b></p>
    <p><textarea rows="10" cols="45" name="textarea" placeholder="">ольга, Зіна, олександр, Олександр, Алекс, яна, Анатолій, Сергій, Женя, Євген, ірина</textarea></p>
    <input type="submit">
</form>
<?php
if (!empty($_POST['textarea'])) {
    $msg = "";
    $textarea = $_POST['textarea'];
    
    $str1 = trim($textarea);
    
    $separator = mb_strpos($str1, ',');
    
    if ($separator !== false) {

            $ukrainian_alphabet = array('A','Б','В','Г','Ґ','Д','Е','Є','Ж','З','И','І','Ї','Й','К','Л','М','Н','О','П','Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Ь','Ю','Я','а','б','в','г','ґ','д','е','є','ж','з','и','і','ї','й','к','л','м','н','о','п','р','с','т','у','ф','х','ц','ч','ш','щ','ь','ю','я');
        
            $str2 = rtrim(preg_replace('/\s+/', '', $str1), ',');

            $array_words = preg_split('/,/', $str2);

            echo "<b>Before</b><br>";
            for($i=0;$i<count($array_words);$i++){
                $el = $array_words[$i];
                if($i == (count($array_words)-1)){
                    echo "$el.";
                }else{
                    echo "$el, ";
                }
            }
            echo '<br><br>';


            usort($array_words, "customSort");
            

            echo "<b>After</b><br>";
            
            for($i=0;$i<count($array_words);$i++){
                $el = $array_words[$i];
                if($i == (count($array_words)-1)){
                    echo "$el.";
                }else{
                    echo "$el, ";
                }
            }
            
    } else {
        $msg = "Розділіть слова комами";
    }
 
    echo "<br>$msg";
}

function customSort($a, $b){
    global $ukrainian_alphabet;
    
    $length_a = mb_strlen($a);
    $length_b = mb_strlen($b);
    $min_length = 0;
    
    if($length_a == $length_b) $min_length = $length_a;
    
    if($length_a < $length_b) $min_length = $length_a;
    
    if($length_a > $length_b) $min_length = $length_b;
    
    $result = null;
    
    $words_same = true;
    
    $array_a = mb_str_split($a);
    $array_b = mb_str_split($b);

    for ($i=0;$i<$min_length;$i++){
        if($words_same){
            $pos_a = array_search($array_a[$i], $ukrainian_alphabet);
            $pos_b = array_search($array_b[$i], $ukrainian_alphabet);

            if($pos_a == $pos_b){
                $words_same = true;
                $result = 0;
            }
            if($pos_a < $pos_b){
                $words_same = false;
                $result = -1;
            }
            if($pos_a > $pos_b){
                $words_same = false;
                $result = 1;
            }
        }
    } 
    
    
    return $result;
}
?>

</body>
</html>