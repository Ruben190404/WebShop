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

    public function getAllByCategory($category) {
        $database = new Database();
        $conn = $database->connect();

        if (!$category) {
            $stmt = $conn->prepare("SELECT * FROM products");
        } else {
            $stmt = $conn->prepare("SELECT * FROM products WHERE category = :category");
            $stmt->bindParam(':category', $category);
        }

        $stmt->execute();

        return $stmt->fetchAll();
    }
}

