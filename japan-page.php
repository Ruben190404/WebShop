<?php

session_start();

include 'Product.php';


if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] += 1;
    } else {
        $_SESSION['cart'][$product_id] = 1;
    }
}

$totalnumber = 0;
foreach ( $_SESSION['cart'] as $id => $amount){
    $totalnumber  += $amount;
}




$productDB = new Product();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <title>Wok & Roll</title>
</head>
<body>



    <!-- Navbar -->

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
                            new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
                        }
                    </script>
                    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                    <li class="nav-item">
                        <a href="index.html" class="nav-link">Informatie</a>
                    </li>
                    <li class="nav-item">
                        <a href="indian-page.html" class="nav-link">Webshop</a>
                    </li>
                    <li class="nav-item">
                        <a href="workshop.html" class="nav-link">Workshop's</a>

                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" id="cart"><i class="fa fa-shopping-cart"></i> Cart <span class="badge"><?php echo $totalnumber?> </span></a>
                    </li>
                </ul>
            </div>

            <div class="shopping-cart">
                <div class="shopping-cart-header">
                    <i class="fa fa-shopping-cart cart-icon"></i><span class="badge"><?php echo $totalnumber?></span>
                    <div class="shopping-cart-total">
                        <span class="lighter-text">Total:</span>
                        <span class="main-color-text"><?php
                            $total = 0;
                            foreach ($_SESSION['cart'] as $id => $amount) {
                                $product = $productDB->getProduct($id);
                                if (!empty($product)) {
                                    $total += ($product['price'] * $amount);
                                }
                            }
                            echo '&euro;&nbsp;' . number_format($total, 2, ',', '.') . ' <br>';
                            ?></span>
                    </div>
                </div>

                <ul class="shopping-cart-items">
                    <?php
                    foreach ($_SESSION['cart'] as $id => $amount) {
                        $product = $productDB->getProduct($id);
                        if (!empty($product)) {
                        ?>
                        <li class="clearfix">
                            <span class="item-name"><?php echo $product['name']; ?></span>
                            <span class="item-price"><?php echo $product['price']; ?></span>
                            <span class="item-quantity">Quantity: <?php echo $amount;?></span>
                        </li>
                        <?php
                        }
                    }
                    ?>
                </ul>

                <a href="checkout.php" class="button">Checkout</a>
            </div>

        </div>
    </nav>

    <!-- Onze Producten -->


    <section id="webshop" class="m-1 mt-5">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md">
                    <img src="images/indian1.png" class="img-fluid rounded-pill" alt="">
                </div>
                <div class="col-md ms-3">
                    <h2>De Japanse Keuken</h2>
                    <p class="lead">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugiat, voluptates alias cupiditate doloribus fuga exercitationem.
                    </p>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Esse ex asperiores, ab sit autem quidem quo animi sapiente blanditiis laborum, sint, mollitia incidunt exercitationem sed eos quisquam earum velit dolore?
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Boxes -->
    
    <section class="p-1 p-sm-3 p-md-4 p-lg-5 mt-2 mt-lg-0">
        <div class="container">
            <div class="row text-center g-3">
                <?php
                $products = $productDB->getAllByCategory('japan');
                foreach ($products as $product) {
                    ?>
                    <div class="col-md">
                        <div class="card bg-dark text-light">
                            <div class="card-body text-center">
                                <div class="h1 mb-3">
                                    <img src="images/indian600x600.jpg" alt="" class="img-fluid">
                                </div>
                                <h3 class="card-title mb-3">
                                    <h1><?= $product['name']; ?></h1>
                                </h3>
                                     <p><?= $product['price']; ?></p>
                                <p class="card-text">
                                <p><?= $product['description']; ?></p>
                                </p>
                                <form method="post">
                                    <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
                                    <a href="#"><button class="btn btn-warning">In Winkelmandje</button></a>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </section>

    <!-- Footer -->

    <footer class="p-5 bg-dark text-white text-center position-relative">
        <div class="container">
            <p class="lead">Copyright &copy; 2021 Wok&Roll</p>

            <a href="checkout.php" class="position-absolute bottom-0 end-0 p-5">
                <i class="bi bi-arrow-up-circle text-warning h1"></i>
            </a>
        </div>
    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="jquery.js"></script>

<script>
(function(){

$("#cart").on("click", function() {
$(".shopping-cart").fadeToggle( "fast");
});

})();</script>
</body>
</html>
