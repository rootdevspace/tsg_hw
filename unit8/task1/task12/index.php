<html>
    <head>
        <title>Форма завантаження файла</title>
        <meta charset="UTF-8">
    </head>
    <body>

        <form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <input type="hidden" name="MAX_FILE_SIZE" value="10000000" >
            Завантажити файл: <br><br>
            <input name="filename" type="file" ><br><br>
            <input type="submit" value="Завантажити" ><br><br>
        </form>

        <form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <input type="hidden" name="flag_del" value="yes" >
            <input type="submit" value="Видалити файли" ><br><br>
        </form>

        <?php require 'script_oop.php';?>

    </body>
</html>