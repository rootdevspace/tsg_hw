<html>
<head>
    <title>Форма</title>
    <meta charset="UTF-8">
</head>
<body>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    Ведіть текст : <input type="text" name="custom_text"><br>
    <input type="submit">
</form>
<?php
if (!empty($_POST['custom_text'])) {
    $custom_text = $_POST['custom_text'];
    
    //$custom_text = "я написав це https://domain.com/path/path/path/end і це http://domain.com/path і навіть це ftp://domain.com/path";
    
    echo "Ваш оригінальний текст: $custom_text<br>";
    
    $pattern = '/((http|https|ftp):\/\/([a-z0-9-]+\.)+[a-z]{2,4}\/([a-z0-9\/]*))/i';
    
    $custom_text = preg_replace($pattern, "<a href=\"$1\">Link</a>", $custom_text);
    
    echo "Ваш модифікований текст: $custom_text";
}
?>
    

</body>
</html>