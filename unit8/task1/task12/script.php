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
