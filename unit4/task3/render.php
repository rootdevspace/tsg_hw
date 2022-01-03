<a href="<?php $_SERVER['PHP_SELF']; ?>?sort=price&order=0">Від дешевших до дорожчих</a>
    <br>
<a href="<?php $_SERVER['PHP_SELF']; ?>?sort=price&order=1">Від дорожчих до дешевших</a>


<?php
if (isset($_GET['sort'])) {
            $sort = $_GET['sort'];
        } else 
        { 
            $sort = "name";
        }
if (isset($_GET['order'])) {
            $order = $_GET['order'];
            
            if($_GET['order'] == 1){
                for ($i=0;$i<count($products)-1;$i++){
                    for ($j=0;$j<count($products)-$i-1;$j++){
                        if($products[$j]['price'] < $products[$j+1]['price']){
                            $tmp_var = $products[$j + 1];
                            $products[$j + 1] = $products[$j];
                            $products[$j] = $tmp_var;
                        }
                    }
                }
            }
            if($_GET['order'] == 0){
                for ($i=0;$i<count($products)-1;$i++){
                    for ($j=0;$j<count($products)-$i-1;$j++){
                        if($products[$j]['price'] > $products[$j+1]['price']){
                            $tmp_var = $products[$j + 1];
                            $products[$j + 1] = $products[$j];
                            $products[$j] = $tmp_var;
                        }
                    }
                }
            }
        } else {
            $order = 0;
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
