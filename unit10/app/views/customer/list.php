<?php
$customer =  $this->get('customer');

foreach($customer as $c)  :
?>
    <div class="customer">
        <p><b>Ім'я:</b> <span class="customerText"> <?php echo $c['first_name']?></span></p>
        <p><b>Фамілія:</b> <span class="customerText"> <?php echo $c['last_name']?></span></p>
        <p><b>Тел.:</b> <span class="customerText"> <?php echo $c['telephone']?></span></p>
        <p><b>Пошта:</b> <span class="customerText"> <?php echo $c['email']?></span></p>
        <p><b>Місто:</b> <span class="customerText"> <?php echo $c['city']?></span></p>
    </div>
<?php endforeach; ?>

