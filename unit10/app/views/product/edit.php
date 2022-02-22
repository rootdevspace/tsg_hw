<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
    <input id="id" name="id" type="hidden" value="<?= $product['id'] ?>"/>
    <p>
        <label class="productAddLables" for="sku">Код:</label>
        <input id="sku" name="sku" type="text" size="40" value="<?= $product['sku'] ?>">
    </p>
    <p>
        <label class="productAddLables" for="name">Назва:</label>
        <input id="name" name="name" type="text" size="40" value="<?= $product['name'] ?>">
    </p>
    <p>
        <label class="productAddLables" for="price">Ціна:</label>
        <input id="price" name="price" type="text" size="40" value="<?= $product['price'] ?>">
    </p>
    <p>
        <label class="productAddLables" for="qty">Кількість:</label>
        <input id="qty" name="qty" type="text" size="40" value="<?= $product['qty'] ?>">
    </p>
    <p>
        <label class="productAddLables" for="description">Опис:</label>
        <textarea id="description" name="description" cols="39" rows="3"><?= $product['description'] ?></textarea></p>
    </p>
    <p>
        <input type="submit" value="Submit">
        &nbsp;
        <input type="reset" value="Reset">
    </p>
</form>

<?php
if (($this->get('saved')) === 1) {
    echo "<p class='notice'>Товар відредаговано</p>";
}elseif (($this->get('saved')) === 0) {
    echo "<p class='notice'>Товар не відредаговано</p>";
}
?>

