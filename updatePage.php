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

if (!empty($_POST) && ($_POST['productId'])) {
    $image_file= $_FILES["updateImage"]["name"];
    $targetFile= "images/uploads/".$image_file;
    move_uploaded_file($_FILES["updateImage"]['tmp_name'],$targetFile);

}

if (isset($_POST['updateName']) && !empty($_POST['updateName'])) {
    $stmt = $conn->prepare('UPDATE products SET name=:name WHERE id=:id');
    $stmt->bindParam(':id', $_POST['updateProductId']);
    $stmt->bindParam(':name', $_POST['updateName']);
    $stmt->execute();
    Header("Location: adminPage.php?update=1" );
    exit;
}

if (isset($_POST['updatePrice']) && !empty($_POST['updatePrice'])) {
    $stmt = $conn->prepare('UPDATE products SET price=:price WHERE id=:id');
    $stmt->bindParam(':id', $_POST['updateProductId']);
    $stmt->bindParam(':price', $_POST['updatePrice']);
    $stmt->execute();
    Header("Location: adminPage.php?update=1" );
    exit;
}

if (isset($_POST['updateDescription']) && !empty($_POST['updateDescription'])) {
    $stmt = $conn->prepare('UPDATE products SET description=:description WHERE id =:id');
    $stmt->bindParam(':id', $_POST['updateProductId']);
    $stmt->bindParam(':description', $_POST['updateDescription']);
    $stmt->execute();
    Header("Location: adminPage.php?update=1" );
    exit;
}

if (isset($_POST['updateCategory']) && !empty($_POST['updateCategory']) && ($_POST['updateCategory']) == 0) {
    $stmt = $conn->prepare('UPDATE products SET category=:category WHERE id =:id');
    $stmt->bindParam(':id', $_POST['updateProductId']);
    $stmt->bindParam(':category', $_POST['updateCategory']);
    $stmt->execute();
    Header("Location: adminPage.php?update=1" );
    exit;
}

if (isset($_POST['updateImage']) && !empty($_POST['updateImage'])) {
    $stmt = $conn->prepare('UPDATE products SET picture=:picture WHERE id =:id');
    $stmt->bindParam(':id', $_POST['updateProductId']);
    $stmt->bindParam(':picture', $targetFile);
    $stmt->execute();
    Header("Location: adminPage.php?update=1" );
    exit;
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bewerk Pagina</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="container py-5"></div>
<div class="container py-5">
<div class="container w-25 pt-5">
    <div class="h1 text-center p-3">Bewerk Pagina</div>
    <form method="POST" enctype="multipart/form-data" action="">
        <input type="hidden" name="updateProductId" value="<?= $_POST['updateProductId']; ?>">
        Naam: <input type="text" class="form-control mb-2" name="updateName" placeholder="Product Naam...">
        Prijs: <input type="number" class="form-control mb-2" name="updatePrice" placeholder="Product Prijs...">
        Categorie: <select class="form-select" name="updateCategory" aria-label="Default select example">
            <option value="0">Kies Categorie</option>
            <option value="Indiase">Indiaas</option>
            <option value="Japanse">Japans</option>
            <option value="Chinese">Chinees</option>
            <option value="Thaise">Thais</option>
            <option value="Vietnamese">Vietnamees</option>
            <option value="Benodigheden">Benodigheden</option>
        </select>
        Beschrijving: <input type="text" class="form-control mb-2" name="updateDescription" placeholder="Product Beschrijving...">
        Afbeelding: <input type="file" class="form-control" name="updateImage">
        <button class="btn btn-primary mt-2" type="submit">Bewerk Product</button>
    </form>
</div>
</div>
</body>
</html>
