<?php
$products = [];
$file = fopen('product.csv', 'r');

fgetcsv($file, 1000, ';');

while (($row = fgetcsv($file, 1000, ';')) !== FALSE) {
    $products[] = [
        'name' => $row[0],
        'art' => $row[1],
        'price' => $row[2],
        'quantity' => $row[3]
    ];
}
fclose($file);

$pdo = new PDO('mysql:host=localhost;dbname=test', 'user', 'pass');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "INSERT INTO product (name, art, price, quantity) 
        VALUES (:name, :art, :price, :quantity)
        ON DUPLICATE KEY UPDATE 
            price = VALUES(price), 
            quantity = VALUES(quantity)";

$stmt = $pdo->prepare($sql);


$added = 0;
$updated = 0;

foreach ($products as $product) {
    $stmt->execute([
        ':name' => $product['name'],
        ':art' => $product['art'],
        ':price' => $product['price'],
        ':quantity' => $product['quantity']
    ]);

    if ($stmt->rowCount() == 1) {
        $added++;
    } else {
        $updated++;
    }
}