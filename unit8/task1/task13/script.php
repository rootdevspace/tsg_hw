<?php

$file_source = "files/source.txt";
$file_dest = "files/dest.txt";

$str = file_get_contents($file_source);

echo "<b>Before:</b><br>$str";
echo '<br><br>';

$tmp_str = '';
$tmp_word = '';

for ($i = 0; $i < mb_strlen($str); $i++) {
    $step = mb_substr($str, $i, 1);
    if ($step === ' ' || $step === '.' || $step === ',') {
        $tmp_str .= implode(array_reverse(mb_str_split($tmp_word)));
        $tmp_word = '';
        $tmp_str .= $step;
    } elseif ($step === "\n") {
        $tmp_str .= $step;
    } else {
        if ($i == (mb_strlen($str) - 1)) {
            $tmp_str .= implode(array_reverse(mb_str_split($tmp_word)));
            $tmp_word = '';
        } else {
            $tmp_word .= $step;
        }
    }
}

echo "<b>After:</b><br>$tmp_str";

file_put_contents($file_dest, $tmp_str);
?>
