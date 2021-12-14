<html>
<head>
    <title>Форма</title>
    <meta charset="UTF-8">
</head>
<body>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    Ваш Email: <input type="text" name="custom_email"><br>
    <input type="submit">
</form>
<?php
if (!empty($_POST['custom_email'])) {
    $custom_email = $_POST['custom_email'];
    $msg = "";
    
    if (strpos($custom_email, '@') === false) {
        $msg = 'please input correct email';
    }
    if (strpos($custom_email, '@') !== false) {
        $dog_position = strpos($custom_email, '@');
        $domain = substr($custom_email, $dog_position+1);
        if(strlen($domain)>2){
            echo "strlen domain is ".strlen($domain);
            echo '<br>';
            if (strpos($domain, '.') === false) {
                $msg = 'Error - dot NOT FOUND';
            }
            if (strpos($domain, '.') !== false && strpos($domain, '.') == (strlen($domain)-1)) {
                $msg = "Error - dot in END";
            }
            if (strpos($domain, '.') !== false && strpos($domain, '.') == 0) {
                $msg = "Error - dot in START";
            }
            if (strpos($domain, '.') !== false && strpos($domain, '.') != (strlen($domain)-1) && strpos($domain, '.') != 0) {
                $msg = 'All good!!!';
            }
        } else {
            $msg = 'Error - domain length should be more then 2 characters';
        }
        
        echo "@ position: $dog_position";
        echo '<br>';
        echo "domain: $domain";
        echo '<br>';
        echo "Email, $custom_email<br>";
        
    } else {
        $msg = 'please input correct email';
    }
    
    echo '<br>';
    echo "Message: $msg";
}
?>

</body>
</html>