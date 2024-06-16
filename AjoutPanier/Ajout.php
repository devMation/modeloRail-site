<?php

require '../connect_database/connect.php';

var_dump($_POST);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $prep = $conn->prepare("INSERT INTO panier (name, price, quantity) VALUES (?, ?, ?)");
    $prep->execute([$name, $price, $quantity]);
    echo 'Item added to cart successfully.';
}