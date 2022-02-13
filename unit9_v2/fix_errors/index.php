<?php

define('ROOT', getcwd());
define('DS', DIRECTORY_SEPARATOR);

error_reporting(E_ALL);

require_once('Autoloader.php');
Autoloader::registerAutoload();

$samsung = new Phone('Galaxy S21', 'Samsung', 2500, '256 GB');
$cleanCode = new Book('Clean Code by Robert Martin', 'Фабула', 550, 448);

echo ShopProductWriter::getShopProductInfo($samsung);
echo ShopProductWriter::getShopProductInfo($cleanCode);












































































echo '<img src="https://steamuserimages-a.akamaihd.net/ugc/884104767788743201/BCEA17C2B9D8A6B4EE3A9DA85B828C82F28BC4C0/?imw=268&imh=268&ima=fit&impolicy=Letterbox&imcolor=%23000000&letterbox=true" alt="Good job">';