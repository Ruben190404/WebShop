<?php
session_start();

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
    if (!empty($amount)) {
        $totalnumber += $amount;
    }
}


if (!isset($_SESSION['status'])) {
    $_SESSION['status'] = 0;
}

if (!isset($_SESSION['adminstatus'])) {
    $_SESSION['adminstatus'] = 0;
}

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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="style.css">
    <title>Wok & Roll</title>
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
            <i class="fa fa-shopping-cart cart-icon"></i><span class="badge"><?php echo $totalnumber?></span>
            <div class="shopping-cart">
                <div class="shopping-cart-header">

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
                            echo  '&euro;&nbsp;' . number_format($total, 2, ',', '.') . ' <br>';
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
                                <span class="item-quantity">Aantal: <?php echo $amount;?></span>
                            </li>
                            <?php
                        }
                    }
                    ?>
                </ul>
                <a href="checkout.php" class="button">Afrekenen</a>
            </div>
        </div>
    </nav>