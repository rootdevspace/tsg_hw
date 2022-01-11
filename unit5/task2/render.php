<a href="<?php $_SERVER['PHP_SELF']; ?>?sort=price&order=0">Від дешевших до дорожчих</a>
    <br>
<a href="<?php $_SERVER['PHP_SELF']; ?>?sort=price&order=1">Від дорожчих до дешевших</a>


<?php
function customSort($a, $b){
    global $order;
    $a_inner = $a['price'];
    $b_inner = $b['price'];
    if($order == 1){
        if($a_inner == $b_inner){
            return 0;
        }
        
        return ($a_inner > $b_inner) ? -1 : 1;
    }
    if($order == 0){
        if($a_inner == $b_inner){
            return 0;
        }
        
        return ($a_inner < $b_inner) ? -1 : 1;
    }
}

$order = null;

if (isset($_GET['sort'])) {
            $sort = $_GET['sort'];
        } else 
        { 
            $sort = "name";
        }
if (isset($_GET['order'])) {
            $order = $_GET['order'];
            usort($products, "customSort");
        }

// Сортування


foreach($products as $product)  :
?>
    <div class="product">
        <p class="sku">Код: <?php echo $product['sku']?></p>
        <h4><?php echo $product['name']?><h4>
        <p> Ціна: <span class="price"><?php echo $product['price']?></span> грн</p>
        <p><?php if(!$product['qty'] > 0) { echo 'Нема в наявності'; } ?></p>
    </div>
<?php endforeach; ?>
