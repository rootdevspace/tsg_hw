<html>
<head>
    <title>Задача 3</title>
    <meta charset="UTF-8">
</head>
<body>

<?php
if (!date('H:i:s',time())>=date('H:i:s',mktime(3,0,0))&&!date('H:i:s',time())<date('H:i:s',mktime(11,0,0))) {
    echo "Привіт, світ!";
} else {
    echo "Добрий ранок, світ!";
}
?>

</body>
</html>