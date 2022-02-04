<?php
session_start();
if (!isset($_SESSION['adminstatus'])) {
    $_SESSION['adminstatus'] = 0;
}

if ($_SESSION['adminstatus'] === 0) {
    Header("Location: login.php");
}

include 'Product.php';

$newProduct = new Product();

if (isset($_POST['productId'])) {
    $newProduct->deleteProduct($_POST['productId']);
}

if (!empty($_POST) && !isset($_POST['productId'])) {
    $newProduct->addProduct($_POST['addName'], $_POST['addPrice'], $_POST['addCategory'], $_POST['addDescription']);

}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Pagina</title>
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

<div class="container m-5">&nbsp;</div>

<div class="container w-25 mt-5 border border-dark p-4 rounded">
    <div class="h2 mb-3">Producten toevoegen</div>
    <form method="POST" enctype="multipart/form-data">
        Naam: <input type="text" class="form-control mb-2" name="addName" placeholder="Product Naam...">
        Prijs: <input type="number" step="0.01" min="0" class="form-control mb-2" name="addPrice" placeholder="Product Prijs...">
        Categorie: <select class="form-select mb-2" name="addCategory" aria-label="Default select example">
            <option value="0">Kies Categorie</option>
            <option value="Indiase">Indiaas</option>
            <option value="Japanse">Japans</option>
            <option value="Chinese">Chinees</option>
            <option value="Thaise">Thais</option>
            <option value="Vietnamese">Vietnamees</option>
            <option value="Benodigheden">Benodigheden</option>
        </select>
        <label for="description" class="form-label">Beschrijving:</label>
        <textarea class="form-control mb-2" id="description" rows="3"></textarea>
        Afbeelding: <input type="file" class="form-control mb-3" name="image">
        <button class="btn btn-white border-secondary" type="submit">Product Toevoegen</button>
    </form>
</div>

<div class="container overflow-auto pt-5">
    <?php
    if (!empty($_GET['update'])) {
        echo 'Het product is opgeslagen.';
    }
    ?>

    <table  class="table table-hover table-striped">
        <thead>
        <tr>
            <th scope="col" class="text-center">Naam</th>
            <th scope="col" class="text-center">Prijs</th>
            <th scope="col" class="text-center">Categorie</th>
            <th scope="col" class="text-center">Beschrijving</th>
            <th scope="col" class="text-center">Afbeeling</th>
            <th scope="col" class="text-center">Verwijder/Bewerken</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($newProduct->getAllProducts() as $product) {
            ?>
            <tr class="product">
                <td class="text-center"><?= $product['name']; ?></td>
                <td class="text-center">€<?= $product['price']; ?></td>
                <td class="text-center"><?= $product['category'];?></td>
                <td class="text-center"><?= $product['description'];?></td>
                <td class="text-center"><img src="<?= $product['picture'];?>" width="auto" height="80px" alt=""></td>
                <td>
                    <form method="post" class="text-center mt-2">
                        <input type="hidden" name="productId" value="<?= $product['id']; ?>">
                        <button class="btn btn-white border-secondary">Verwijder</button>
                    </form>
                    <form method="post" class="text-center" action="updatePage.php">
                        <input type="hidden" name="updateProductId" value="<?= $product['id']; ?>">
                        <button class="btn btn-white border-secondary">Bewerken</button>
                    </form>
                </td>
            </tr>

            <?php
        }
        ?>
        </tbody>
    </table>
</div>

    </body>
</html>
