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

        <?php
        $upload_dir = "upload";
        $upload_files = scandir($upload_dir);

        if (isset($_POST['flag_del'])) {
            if (count($upload_files) > 2) {
                foreach ($upload_files as $filename) {
                    if ($filename !== "." && $filename !== "..") {
                        $end_of_file = substr($filename, -4);

                        if ($end_of_file === '.txt') {
                            $str = file_get_contents("upload/$filename");

                            if (preg_match('/\sтест\s/u', $str) === 1 || preg_match('/^тест$/u', $str) === 1 || preg_match('/^тест\s/u', $str) === 1 || preg_match('/\sтест$/u', $str) === 1) {
                                echo "$filename - видалено<br>";
                                unlink("upload/$filename");
                            }
                        }
                    }
                }
                echo '<br>';
            } else {
                echo 'Папка Upload порожня!<br>';
            }
        }


        if (isset($_FILES['filename'])) {
            $filename = $_FILES['filename']['name'];
            $tmp_filename = $_FILES['filename']['tmp_name'];
            move_uploaded_file($tmp_filename, "$upload_dir/$filename");
        }

        if (count($upload_files) > 2) {
            echo '<b>Upload:</b><br>';
            
            foreach ($upload_files as $filename) {
                if ($filename !== "." && $filename !== "..") {
                    echo "$filename<br>";
                }
            }
        } else {
            echo 'Завантажте файли!<br>';
        }
        ?>

    </body>
</html>