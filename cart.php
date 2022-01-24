<?php

session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_POST['product_id'])) {
    $_SESSION['cart'][] = $_POST['product_id'];
}

var_dump($_SESSION['cart']);
echo '<br><br>';
var_dump(array_count_values($_SESSION['cart']));


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

?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        body {
            padding: 1rem;
        }

        .products {
            display: flex;
        }

        .product {
            padding: 1rem .8rem;

            border: 1px solid black;
        }

        .cart {
            position: absolute;

            top: 1rem;
            right: 1rem;

            background: mediumslateblue;
            color: white;

            padding: .5rem;

            border-radius: 50%;

            box-shadow: 0 0 5px 5px rgba(0, 0, 0, .3);
        }

        .cart-products {
            display: none;

            position: absolute;
            top: 100%;
            right: 0;

            width: 200px;
            min-height: 50px

            background: white;
            border-radius: 5px;

            color: black;

            box-shadow: 0 0 5px 5px rgba(0, 0, 0, .3);
        }

        .cart:hover .cart-products {
            display: block;
        }
    </style>
</head>
<body>

<div class="cart"><span>$</span>

    <div class="cart-products">
        <?php
        $total = 0;
        foreach (array_count_values($_SESSION['cart']) as $id => $amount) {
            $stmt = $conn->prepare("SELECT * FROM products WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $product = $stmt->fetch();

            echo $product['name'] . ' x' . $amount . ' <br>';
        }
        ?>
    </div>
</div>

<div class="products">

    <?php

    $stmt = $conn->prepare("SELECT * FROM products");
    $stmt->execute();

    $products = $stmt->fetchAll();

    foreach ($products as $product) {

        ?>

        <div class="product">
            <h1><?= $product['name']; ?></h1>
            <p><?= $product['price']; ?></p>
            <form method="post">
                <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
                <button>In winkelwagen</button>
            </form>
        </div>

        <?php

    }

    ?>

</div>

</body>
</html>
