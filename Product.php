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
    public function addProduct($name, $price, $category, $description, $targetFile)
    {
        $db = new Database();
        $conn = $db->connect();

        $statement = $conn->prepare("insert into products (name, price, category, description, image) values (:name, :price, :category, :description, :image)");
        $statement->bindParam(":name", $name);
        $statement->bindParam(":price", $price);
        $statement->bindParam(":description", $description);
        $statement->bindParam(":category", $category);
        $statement->bindParam(":image", $targetFile);
        $statement->execute();
    }
}
