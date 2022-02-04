<?php

session_start();

if (!isset($_SESSION['status'])) {
    $_SESSION['status'] = 0;
}
if (!isset($_SESSION['adminstatus'])) {
    $_SESSION['adminstatus'] = 0;
}


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

<nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="images/tiger.svg" alt="" width="60" height="auto">
        </a>
        <a href="index.php" class="navbar-brand text-warning">Wok & Roll</a>

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
                    <a href="workshop.php" class="nav-link">Workshop's</a>
                </li>
                <li class="nav-item">
                    <a href="contact.php" class="nav-link">Contact</a>
                </li>
                <li class="nav-item">
                    <a href="login.php" class="nav-link" <?php echo ($_SESSION['status'] == 1) ? 'style="display:none;"' : '' ?>>Login</a>
                    <a href="logout.php" class="nav-link" <?php echo ($_SESSION['status'] == 0)? 'style="display:none;"' : ''  ?>>Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">&nbsp;</div>

<div class="container w-25 mt-5 border border-dark p-4 rounded">
    <div class="h2 text-center p-3">Bewerk Pagina</div>
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
        <button class="btn btn-white border-secondary mt-2" type="submit">Bewerk Product</button>
        <a href="adminPage.php" class="btn btn-white border-secondary mt-2">Terug</a>
    </form>
</div>
</body>
</html>
