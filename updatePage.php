<?php
include_once 'Product.php';

$newProduct = new Product();

if (!empty($_POST['updateName'])) {
    $newProduct->updateProduct($_POST['updateProductId']);
    Header("Location: adminPage.php?update=1" );
    exit;
}

$product = $newProduct->getProduct($_POST['updateProductId']);

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
<div class="container">
<div class="container w-25">
    <div class="h1 text-center p-3">Bewerk Pagina</div>
    <form method="POST" enctype="multipart/form-data" action="">
        <input type="hidden" name="updateProductId" value="<?php echo $_POST['updateProductId']; ?>">
        Naam: <input type="text" class="form-control mb-2" name="updateName" placeholder="Product Naam..." value="<?php echo $product['name']; ?>" required>
        Prijs: <input type="number" class="form-control mb-2" name="updatePrice" placeholder="Product Prijs..." value="<?php echo $product['price']; ?>" required>
        Categorie: <select class="form-select" name="updateCategory" aria-label="Default select example">
            <option value="0">Kies Categorie</option>
            <option value="Indiase" <?php if ($product['category'] === 'Indiase') { echo 'selected';}?>>Indiaas</option>
            <option value="Japanse" <?php if ($product['category'] === 'Japanse') { echo 'selected';}?>>Japans</option>
            <option value="Chinese" <?php if ($product['category'] === 'Chinese') { echo 'selected';}?>>Chinees</option>
            <option value="Thaise" <?php if ($product['category'] === 'Thaise') { echo 'selected';}?>>Thais</option>
            <option value="Vietnamese" <?php if ($product['category'] === 'Vietnamese') { echo 'selected';}?>>Vietnamees</option>
            <option value="Benodigheden" <?php if ($product['category'] === 'Benodigheden') { echo 'selected';}?>>Benodigheden</option>
        </select>
        Beschrijving: <input type="text" class="form-control mb-2" name="updateDescription" placeholder="Product Beschrijving..." value="<?php echo $product['description']; ?>">
        Huidige afbeelding: <img class="rounded ps-4" width="auto" height="250px" src="<?php echo $product['picture'];?>" />
        Nieuwe afbeelding (leeglaten wanneer niet van toepassing): <input type="file" class="form-control" name="image">
        <button class="btn btn-primary mt-2" type="submit">Bewerk Product</button>
        <a href="adminPage.php" class="btn btn-primary mt-2">Terug</a>
    </form>
</div>
</div>
</body>
</html>
