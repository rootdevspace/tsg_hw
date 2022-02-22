<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
    <p>
        <label class="productAddLables" for="sku">Код:</label>
        <input id="sku" name="sku" type="text" size="40">
    </p>
    <p>
        <label class="productAddLables" for="name">Назва:</label>
        <input id="name" name="name" type="text" size="40">
    </p>
    <p>
        <label class="productAddLables" for="price">Ціна:</label>
        <input id="price" name="price" type="text" size="40">
    </p>
    <p>
        <label class="productAddLables" for="qty">Кількість:</label>
        <input id="qty" name="qty" type="text" size="40">
    </p>
    <p>
        <label class="productAddLables" for="description">Опис:</label>
        <textarea id="description" name="description" cols="39" rows="3"></textarea></p>
    </p>
    <p>
        <input type="submit" value="Submit">
        &nbsp;
        <input type="reset" value="Reset">
    </p>
</form>

<?php
$productMessage =  $this->get('productMessage');

echo "<p class='notice'>$productMessage</p>";
?>

