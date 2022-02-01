<?php

class FilesBackuper {

    protected $uploadDir = "upload";
    protected $dirBackup = 'backup';
    protected $htmlInputFilename = 'filename';
    protected $neededHour = 23;
    protected $neededMinute = 53;
    protected $neededSecond = 16;

    protected function isExistUploadDir() {
        if (!file_exists($this->uploadDir)) {
            if (!mkdir($this->uploadDir, 0755, true)) {
                die('Не вдалось створити папку Upload...');
            }
        } else {
            $this->moveFilesToUpload();
        }
    }

    protected function moveFilesToUpload() {
        if (isset($_FILES[$this->htmlInputFilename])) {
            $filename = $_FILES[$this->htmlInputFilename]['name'];
            $tmpFilename = $_FILES[$this->htmlInputFilename]['tmp_name'];
            move_uploaded_file($tmpFilename, "$this->uploadDir/$filename");
        }
    }

    protected function isExistBackupDir() {
        if (file_exists($this->dirBackup)) {
            $this->backupFiles();
        } else {
            $this->backupNotFound();
        }
    }

    protected function backupFiles() {
        echo "Папка $this->dirBackup існує<br><br>";

        $backupFiles = scandir("backup");

        $uploadFiles = scandir("upload");

        $neededDate = date("Y-m-d H:i:s", mktime($this->neededHour, $this->neededMinute, $this->neededSecond, date("m"), date("d"), date("Y"))); //в архів після цієї дати і часу
        echo "$neededDate - файли старіше цієї дати будуть потрапляти у Backup<br><br>";

        if (count($uploadFiles) > 2) {
            echo 'Upload:<br>';
            echo '<ul>';
            foreach ($uploadFiles as $filename) {
                $key = false;
                if ($filename !== "." && $filename !== "..") {
                    if (date("Y-m-d H:i:s", filectime("upload/$filename")) < $neededDate) {
                        echo '<li>' . $filename . ' - ' . date("Y-m-d H:i:s", filectime("upload/$filename")) . '</li>';

                        if (copy("upload/$filename", "backup/$filename")) {
                            $key = true;
                        } else {
                            $key = false;
                            echo "не удалось скопировать $filename...\n";
                        }
                    }

                    $for_date = filectime("upload/$filename");
                    if (date("Y-m-d H:i:s", $for_date) >= $neededDate) {
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


        if (count($backupFiles) > 2) {
            echo 'Backup:<br>';
            echo '<ul>';
            foreach ($backupFiles as $filename) {
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
    }

    protected function backupNotFound() {
        echo "Папка $this->dirBackup не існує<br>";
        echo '<br>';
        echo '<b>Оновіть сторінку!</b>&nbsp;';
        echo '<button onclick="location.reload()">Оновити</button>';

        if (!mkdir($this->dirBackup, 0755, true)) {
            die('Не вдалось створити папку...');
        }
    }
    
    public function init() {
        $this->isExistUploadDir();
        $this->isExistBackupDir();
    }

}

$filesBackuper = new FilesBackuper();
$filesBackuper->init();
