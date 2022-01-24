<?php

include 'Database.php';

class Product
{
    public function getProduct($product_id) {
        $database = new Database();
        $conn = $database->connect();
        $stmt = $conn->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->bindParam(':id', $product_id);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function getAllProducts() {
        $database = new Database();
        $conn = $database->connect();
        $stmt = $conn->prepare("SELECT * FROM products");
        $stmt->execute();

        return $stmt->fetchAll();
    }
}