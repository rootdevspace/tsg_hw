<?php

class TestDeleter {

    protected $uploadDir = "upload";
    protected $htmlInputFilename = "filename";
    protected $htmlInputHidden = "flag_del";

    protected function scanUploadDirectory() {
        return scandir($this->uploadDir);
    }

    protected function moveUploadedFile() {
        if (isset($_FILES[$this->htmlInputFilename])) {
            $filename = $_FILES[$this->htmlInputFilename]['name'];
            $tmp_filename = $_FILES[$this->htmlInputFilename]['tmp_name'];
            move_uploaded_file($tmp_filename, "$this->uploadDir/$filename");
        }
    }

    protected function displayUploadFiles($uploadFiles) {
        if (count($uploadFiles) > 2) {
            echo '<b>Upload:</b><br>';

            foreach ($uploadFiles as $filename) {
                if ($filename !== "." && $filename !== "..") {
                    echo "$filename<br>";
                }
            }
        } else {
            echo 'Завантажте файли!<br>';
        }
    }

    protected function isSetFlagDel($uploadFiles) {
        $key = false;
        if (isset($_POST[$this->htmlInputHidden])) {
            if (count($uploadFiles) > 2) {
                foreach ($uploadFiles as $filename) {
                    if ($filename !== "." && $filename !== "..") {
                        $endOfFile = substr($filename, -4);

                        if ($endOfFile === '.txt') {
                            $str = file_get_contents("upload/$filename");

                            if (preg_match('/\sтест\s/u', $str) === 1 || preg_match('/^тест$/u', $str) === 1 || preg_match('/^тест\s/u', $str) === 1 || preg_match('/\sтест$/u', $str) === 1) {
                                echo "$filename - видалено<br>";
                                unlink("upload/$filename");
                                $key = true;
                            }
                        }
                    }
                }

                if ($key) {
                    echo '<br>';
                    echo '<button onclick="window.location.replace(location.href)">Оновити</button>';
                    echo '<br><br>';
                }
                
            } else {
                echo 'Папка Upload порожня!<br>';
            }
        }
    }

    public function init() {
        $this->moveUploadedFile();
        $this->isSetFlagDel($this->scanUploadDirectory());
        $this->displayUploadFiles($this->scanUploadDirectory());
    }

}

$testDeleter = new TestDeleter();
$testDeleter->init();
