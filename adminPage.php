<?php
include 'Product.php';

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

if (isset($_POST['productId'])) {
    $stmt = $conn->prepare('DELETE FROM products WHERE id= :id');
    $stmt->bindParam(':id', $_POST['productId']);
    $stmt->execute();
}

$newProduct = new Product();

if (!empty($_POST) && !isset($_POST['productId'])) {
    $image_file= $_FILES["image"]["name"];
    $targetFile= "images/uploads/".$image_file;
    move_uploaded_file($_FILES["image"]['tmp_name'],$targetFile);
    $newProduct->addProduct($_POST['addName'], $_POST['addPrice'], $_POST['addCategory'], $_POST['addDescription'], $targetFile);

}
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Admin page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="images/tiger.svg" alt="" width="60" height="auto">
            </a>
            <a href="index.html" class="navbar-brand text-warning">Wok & Roll</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    <li id="google_translate_element"></li>
                    <script type="text/javascript">
                        function googleTranslateElementInit() {
                            new google.translate.TranslateElement({pageLanguage: 'nl'}, 'google_translate_element');
                        }
                    </script>
                    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                    <li class="nav-item">
                        <a href="workshop.html" class="nav-link">Workshop's</a>
                    </li>
                    <li class="nav-item">
                        <a href="contact.html" class="nav-link">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a href="login.php" class="nav-link">login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container h-50 overflow-auto pt-5">
        <table  class="table table-hover table-striped">
            <thead>
            <tr>
                <th scope="col" class="text-center">Name</th>
                <th scope="col" class="text-center">Price</th>
                <th scope="col" class="text-center">Category</th>
                <th scope="col" class="text-center">Description</th>
                <th scope="col" class="text-center">Image</th>
                <th scope="col" class="text-center">Delete</th>
            </tr>
            </thead>
            <tbody>
                <?php

                $stmt = $conn->prepare("SELECT * FROM products");
                $stmt->execute();

                $products = $stmt->fetchAll();

                foreach ($products as $product) {

                    ?>

                    <tr class="product">
                        <td class="text-center"><?= $product['name']; ?></td>
                        <td class="text-center">€<?= $product['price']; ?></td>
                        <td class="text-center"><?= $product['category'];?></td>
                        <td class="text-center"><?= $product['description'];?></td>
                        <td class="text-center"><img src="<?= $product['picture'];?>" width="auto" height="80px"></td>
                        <td>
                            <form method="post" class="text-center">
                                <input type="hidden" name="productId" value="<?= $product['id']; ?>">
                                <button class="btn btn-primary">Delete</button>
                            </form>
                            <form method="post" class="text-center" action="updatePage.php">
                                <input type="hidden" name="updateProductId" value="<?= $product['id']; ?>">
                                <button class="btn btn-primary">Update</button>
                            </form>
                        </td>
                    </tr>

                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="container w-25">
        <form method="POST" enctype="multipart/form-data">
            Name: <input type="text" class="form-control mb-2" name="addName" placeholder="Product Name...">
            Price: <input type="number" class="form-control mb-2" name="addPrice" placeholder="Price of Product...">
            Category: <select class="form-select" name="addCategory" aria-label="Default select example">
                            <option selected>Choose category</option>
                            <option value="Indian">Indian</option>
                            <option value="Japanese">Japanese</option>
                            <option value="Chinese">Chinese</option>
                            <option value="Thai">Thai</option>
                            <option value="Vietnamese">Vietnamese</option>
                            <option value="Supplies">Supplies</option>
                      </select>
            Description: <input type="text" class="form-control mb-2" name="addDescription" placeholder="Product Description...">
            Image: <input type="file" class="form-control" name="image">
            <button class="btn btn-primary" type="submit">Add Product</button>
        </form>
    </div>
    </body>
</html>
