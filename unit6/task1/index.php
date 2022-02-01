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

        <?php
        $upload_dir = "upload";
        
        if(!file_exists($upload_dir)){
            if (!mkdir($upload_dir, 0755, true)) {
                die('Не вдалось створити папку Upload...');
            }
        }
        
        if (isset($_FILES['filename'])) {
            $filename = $_FILES['filename']['name'];
            $tmp_filename = $_FILES['filename']['tmp_name'];
            move_uploaded_file($tmp_filename, "$upload_dir/$filename");
        }

        $dir_root = $_SERVER["DOCUMENT_ROOT"]; //     /var/www/tsg.ua
        $dir_backup = $dir_root . '/tsg_hw/unit6/task1/backup';

        if (file_exists($dir_backup)) {
            echo "Папка $dir_backup існує<br><br>";

            $backup_files = scandir("backup");

            $upload_files = scandir("upload");

            $needed_date = date("Y-m-d H:i:s", mktime(23, 53, 16, date("m"), date("d"), date("Y"))); //в архів після цієї дати і часу
            echo "$needed_date - файли старіше цієї дати будуть потрапляти у Backup<br><br>";

            if (count($upload_files) > 2) {
                echo 'Upload:<br>';
                echo '<ul>';
                foreach ($upload_files as $filename) {
                    $key = false;
                    if ($filename !== "." && $filename !== "..") {
                        if (date("Y-m-d H:i:s", filectime("upload/$filename")) < $needed_date) {
                            echo '<li>' . $filename . ' - ' . date("Y-m-d H:i:s", filectime("upload/$filename")) . '</li>';

                            if (copy("upload/$filename", "backup/$filename")) {
                                $key = true;
                            } else {
                                $key = false;
                                echo "не удалось скопировать $filename...\n";
                            }
                        }

                        $for_date = filectime("upload/$filename");
                        if (date("Y-m-d H:i:s", $for_date) >= $needed_date) {
                            echo '<li>' . $filename . ' - ' . date("Y-m-d H:i:s", filectime("upload/$filename")) . ' - не потрапив у Backup</li>';
                        }

                        if ($key) {
                            unlink("upload/$filename");
                        }
                    }
                }
                echo '</ul>';
                echo '<b>Оновіть сторінку!</b>&nbsp;';
                echo '<button onclick="window.location.replace(location.href)">Оновити</button>';
                echo '<br><br>';
            }


            if (count($backup_files) > 2) {
                echo 'Backup:<br>';
                echo '<ul>';
                foreach ($backup_files as $filename) {
                    if ($filename !== "." && $filename !== "..") {
                        echo '<li>' . $filename . '</li>';
                    }
                }
                echo '</ul>';
            } else {
                echo 'Папка Backup ще порожня!';
                echo '<br>';
                echo '<b>Завантажте файли!</b>&nbsp;';
            }
        } else {
            echo "Папка $dir_backup не існує<br>";
            echo '<br>';
            echo '<b>Оновіть сторінку!</b>&nbsp;';
            echo '<button onclick="location.reload()">Оновити</button>';

            if (!mkdir($dir_backup, 0755, true)) {
                die('Не вдалось створити папку...');
            }
        }

        function archiveFromDate() {
            
        }
        ?>

    </body>
</html>