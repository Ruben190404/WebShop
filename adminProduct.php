<?php
include 'Product.php';

$product = new Product();

if (!empty($_POST)) {
    $product->addProduct($_POST['name'], $_POST['price'], $_POST['description']);
}

?>

<form method="POST">
    <br>Add product<br><br>
    Name: <input type="text" name="name"><br>
    Price: <input type="number" step="0.01" name="price"><br>
    Description: <input type="text" name="description"><br>
    <button type="submit">Add Product</button>
</form>

<form method="POST">
    <br>Update product<br><br>
    Name: <input type="text" name="updateName"><br>
    Price: <input type="number" step="0.01" name="updatePrice"><br>
    Description: <input type="text" name="updateDescription"><br>
    <button type="submit">Update Product</button>
</form>

<form method="POST">
    <br>Delete product<br><br>
    Name: <input type="text" name="deleteName"><br>
    <button type="submit">Delete Product</button>
</form>