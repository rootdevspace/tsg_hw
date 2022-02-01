<?php

class Shape {

    public function sqr() {
        
    }

}

class Square extends Shape {

    public function sqr(int $a = 3) {
        echo "<b>Квадрат</b> - площа: " . ($a * $a) . "<br>";
    }

}

class Rectangle extends Shape {

    public function sqr(int $a = 3, int $b = 4) {
        echo "<b>Прямокутник</b> - площа: " . ($a * $b) . "<br>";
    }

}

class Triangle extends Shape {

    public function sqr(int $a = 4, int $b = 5, int $c = 3) {
        $p = ($a + $b + $c) / 2;
        $s = sqrt($p * (($p - $a) * ($p - $b) * ($p - $c)));
        echo "<b>Трикутник</b> - площа: " . $s . "<br>";
    }

}

class Circle extends Shape {

    public function sqr(int $r = 7) {
        $pi = 3.14;
        $s = $pi * ($r * $r);
        echo "<b>Коло</b> - площа: " . $s . "<br>";
    }

}

class DisplayShapes {

    public function choseShape(Shape $shape) {
        $shape->sqr();
    }

}

$square = new Square();
$rectangle = new Rectangle();
$triangle = new Triangle();
$circle = new Circle();

$dispalyShapes = new DisplayShapes();
$dispalyShapes->choseShape($square);
$dispalyShapes->choseShape($rectangle);
$dispalyShapes->choseShape($triangle);
$dispalyShapes->choseShape($circle);
?>