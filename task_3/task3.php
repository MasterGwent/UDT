<?php

require_once 'Database.php';

$db = new Database('localhost', 'db', 'user', 'pass');

$products = $db->query("SELECT * FROM product");

foreach ($products as $product) {
    echo $product['name'] . "\n";
}