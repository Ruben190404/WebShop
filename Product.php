<?php

include 'Database.php';

class Product extends Database
{
    public function getProduct($product_id) {
        $conn = $this->connect();
        $stmt = $conn->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->bindParam(':id', $product_id);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function getAllProducts() {
        $conn = $this->connect();
        $stmt = $conn->prepare("SELECT * FROM products");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function addProduct($name, $price, $category, $description)
    {
        $conn = $this->connect();

        $statement = $conn->prepare("insert into products (name, price, category, description, picture) values (:name, :price, :category, :description, :image)");
        $statement->bindParam(":name", $name);
        $statement->bindParam(":price", $price);
        $statement->bindParam(":description", $description);
        $statement->bindParam(":category", $category);
        $statement->bindParam(":image", $targetFile);
        $statement->execute();

        $id = $conn->lastInsertId();

        $this->uploadImage($id);
    }

    public function updateProduct($id) {
        $conn = $this->connect();

        $stmt = $conn->prepare('UPDATE products SET name=:name, price=:price, category=:category,description=:description WHERE id=:id');
        $stmt->bindParam(':id',$id);
        $stmt->bindParam(':name', $_POST['updateName']);
        $stmt->bindParam(':price', $_POST['updatePrice']);
        $stmt->bindParam(':category', $_POST['updateCategory']);
        $stmt->bindParam(':description', $_POST['updateDescription']);
        $stmt->execute();

        $this->uploadImage($id);
    }

    public function uploadImage($productId) {
        if (!empty($_FILES["image"]["name"])) {
            $image_file = $_FILES["image"]["name"];
            $targetFile = "images/uploads/" . $image_file;
            move_uploaded_file($_FILES["image"]['tmp_name'], $targetFile);

            $conn = $this->connect();
            $stmt = $conn->prepare('UPDATE products SET picture=:picture WHERE id =:id');
            $stmt->bindParam(':id', $productId);
            $stmt->bindParam(':picture', $targetFile);
            $stmt->execute();
        }
    }

    public function getAllByCategory($category) {
        $conn = $this->connect();
        $stmt = $conn->prepare("SELECT * FROM products WHERE category = :category");
        $stmt->bindParam(':category', $category);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function deleteProduct($id) {
        $conn = $this->connect();
        $stmt = $conn->prepare('DELETE FROM products WHERE id= :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }


}