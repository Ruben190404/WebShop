<?php

include 'Database.php';

class Product
{
    public function getAllProducts()
    {
        $db = new Database();
        $conn = $db->connect();

        $statement = $conn->query("select * from products");

        return $statement->fetchAll();
    }

    public function addProduct($name, $price, $description)
    {
        $db = new Database();
        $conn = $db->connect();

        $statement = $conn->prepare("insert into products (name, price, description) values (:name, :email, :password)");
        $statement->bindParam(":name", $name);
        $statement->bindParam(":email", $price);
        $statement->bindParam(":password", $description);
        $statement->execute();
    }
}
