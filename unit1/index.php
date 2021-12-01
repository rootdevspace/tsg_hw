<!doctype html>
<html>
    <body>
        <?php
        
        if(date('H:i:s',time())>=date('H:i:s',mktime(3,0,0))&&date('H:i:s',time())<date('H:i:s',mktime(11,0,0))){
            echo 'Good morning world!';
        }else{
            echo 'Hello world!';
        }
        ?>
    </body>
</html>