<html>
<head>
    <title>Форма</title>
    <meta charset="UTF-8">
</head>
<body>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    Ваше прізвище: <input type="text" name="last_name"><br>
    Ваше ім'я: <input type="text" name="first_name"><br>
    Ваше по-батькові: <input type="text" name="middle_name"><br>
    <input type="submit">
</form>
<?php
$msg = '';

if (!((empty($_POST['first_name'])) && (empty($_POST['middle_name'])) && (empty($_POST['last_name'])))) {
    $first_name = trim($_POST['first_name']);
    $middle_name = trim($_POST['middle_name']);
    $last_name = trim($_POST['last_name']);
    
    
    if((mb_strpos($first_name, ' ') === false) && (mb_strpos($middle_name, ' ') === false) && (mb_strpos($last_name, ' ') === false)){
        
        echo "Hello, $last_name $first_name $middle_name<br>";
        
        $first_name = mb_strtoupper(mb_substr($first_name,0,1));
        $first_name.='. ';
        
        $middle_name = mb_strtoupper(mb_substr($middle_name,0,1));
        $middle_name.='. ';
        
        $last_name = mb_strtoupper(mb_substr($last_name,0,1));
        $last_name.='. ';
        
        echo "Hi, $last_name $first_name $middle_name<br>";
    } else {
        $msg = 'you have spaces in first or middle or last names!!!';
    }
    
} else {
    $msg = 'please input your information';
    
}
echo $msg;
?>

</body>
</html>