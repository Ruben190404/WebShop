<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=login", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//        echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

if(!isset($_POST)){
    $image_file= $_FILES["updateImage"]["name"];
    $targetFile= "images/uploads/".$image_file;
    move_uploaded_file($_FILES["updateImage"]['tmp_name'],$targetFile);

}

if (isset($_POST)) {
    $stmt = $conn->prepare('UPDATE products SET name=:name, price=:price, picture=:picture, description=:description, category=:category WHERE id= :id');
    $stmt->bindParam(':id', $_POST['updateProductId']);
    $stmt->bindParam(':name', $_POST['updateName']);
    $stmt->bindParam(':price', $_POST['updatePrice']);
    $stmt->bindParam(':description', $_POST['updateDescription']);
    $stmt->bindParam(':category', $_POST['updateCategory']);
    $stmt->bindParam(':picture', $targetFile);
    $stmt->execute();
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="container py-5"></div>
<div class="container py-5">
<div class="container w-25 pt-5">
    <div class="h1 text-center p-3">Update Page</div>
    <form method="POST" enctype="multipart/form-data" action="adminPage.php">
        <input type="hidden" name="updateProductId" value="<?= $_POST['updateProductId']; ?>">
        Name: <input type="text" class="form-control mb-2" name="updateName" placeholder="Product Name...">
        Price: <input type="number" class="form-control mb-2" name="updatePrice" placeholder="Price of Product...">
        Category: <select class="form-select" name="updateCategory" aria-label="Default select example">
            <option selected>Choose category</option>
            <option value="Indian">Indian</option>
            <option value="Japanese">Japanese</option>
            <option value="Chinese">Chinese</option>
            <option value="Thai">Thai</option>
            <option value="Vietnamese">Vietnamese</option>
            <option value="Supplies">Supplies</option>
        </select>
        Description: <input type="text" class="form-control mb-2" name="updateDescription" placeholder="Product Description...">
        Image: <input type="file" class="form-control" name="updateImage">
        <button class="btn btn-primary mt-2" type="submit">Update Product</button>
    </form>
</div>
</div>
</body>
</html>
