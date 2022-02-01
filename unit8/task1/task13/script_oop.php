<?php

class ReverseWords {

    protected static $FILESOURCE = "files/source.txt";
    protected static $FILEDEST = "files/dest.txt";
    protected $str = '';
    protected $tmpStr = '';
    protected $tmpWord = '';

    protected function getContentsFromFile() {
        $this->str = file_get_contents(self::$FILESOURCE);
    }

    protected function displayStringBeforeReverse() {
        echo "<b>Before:</b><br>$this->str";
        echo '<br><br>';
    }

    protected function customReverseWords() {
        for ($i = 0; $i < mb_strlen($this->str); $i++) {
            $step = mb_substr($this->str, $i, 1);
            if ($step === ' ' || $step === '.' || $step === ',') {
                $this->tmpStr .= implode(array_reverse(mb_str_split($this->tmpWord)));
                $this->tmpWord = '';
                $this->tmpStr .= $step;
            } elseif ($step === "\n") {
                $this->tmpStr .= $step;
            } else {
                if ($i == (mb_strlen($this->str) - 1)) {
                    $this->tmpStr .= implode(array_reverse(mb_str_split($this->tmpWord)));
                    $this->tmpWord = '';
                } else {
                    $this->tmpWord .= $step;
                }
            }
        }
    }

    protected function displayStringAfterReverse() {
        echo "<b>After:</b><br>$this->tmpStr";
    }

    protected function putContentsToFile() {
        file_put_contents(self::$FILEDEST, $this->tmpStr);
    }

    public function init() {
        $this->getContentsFromFile();
        $this->displayStringBeforeReverse();
        $this->customReverseWords();
        $this->displayStringAfterReverse();
        $this->putContentsToFile();
    }

}

$reverseWords = new ReverseWords();
$reverseWords->init();
?>