<?php

session_start();

include 'Product.php';
$productDB = new Product();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_POST['product_id'])) {
    $_SESSION['cart'][] = $_POST['product_id'];
}

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

$total = 0;
foreach (array_count_values($_SESSION['cart']) as $id => $amount) {
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $products = $stmt->fetchAll();
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
 </head>

<style>
    section {
        font-family: 'Inter', sans-serif;
    }
</style>

<body>
<script src="https://unpkg.com/tailwindcss-jit-cdn"></script>

<!-- Specify a custom Tailwind configuration -->
<script type="tailwind-config"></script>

<!-- Snippet -->
<section class="flex flex-col justify-center antialiased bg-gray-200 text-gray-600 min-h-screen p-4">
    <div class="h-full">
        <!-- Card -->
        <div class="max-w-[360px] mx-auto">
            <div class="bg-white shadow-lg rounded-lg mt-9">
                <!-- Card header -->
                <header class="text-center px-5 pb-5">
                    <!-- Avatar -->
                    <img src="images/tiger.svg" class="inline-flex -mt-9 w-[72px] h-[72px] fill-current rounded-full border-4 border-white box-content shadow mb-3" viewBox="0 0 72 72">
                    <!-- Card name -->
                    <h3 class="text-xl font-bold text-gray-900 mb-1">Invoice from Wok&Roll.</h3>
                    <div class="text-sm font-medium text-gray-500">Invoice #<p id="invoice"></p></div>
                </header>
                <!-- Card body -->
                <div class="bg-gray-100 text-center px-5 py-6">
                    <div class="text-sm mb-6"><strong class="font-semibold">Total:</span>
                            <span class="main-color-text"><?php

                                foreach ($_SESSION['cart'] as $id => $amount) {
                                $product = $productDB->getProduct($id);
                                if (!empty($product)) {
                                }
                                }

                                $total = 0;
                                foreach ($_SESSION['cart'] as $id => $amount) {
                                    $product = $productDB->getProduct($id);
                                    if (!empty($product)) {
                                        $total += ($product['price'] * $amount);
                                    }
                                }
                                echo '&euro;&nbsp;' . number_format($total, 2, ',', '.') . ' <br>';
                                ?></span>

                        </strong> due in 1 week</div>
                    <form class="space-y-3">
                        <div class="flex shadow-sm rounded">
                            <div class="flex-grow">
                                <input name="card-nr" class="text-sm text-gray-800 bg-white rounded-l leading-5 py-2 px-3 placeholder-gray-400 w-full border border-transparent focus:border-indigo-300 focus:ring-0" type="text" placeholder="Card Number" aria-label="Card Number" />
                            </div>
                            <div class="flex-none w-[4.8rem]">
                                <input name="card-expiry" class="text-sm text-gray-800 bg-white leading-5 py-2 px-3 placeholder-gray-400 w-full border border-transparent focus:border-indigo-300 focus:ring-0" type="text" placeholder="MM/YY" aria-label="Expiration" />
                            </div>
                            <div class="flex-none w-[3.5rem]">
                                <input name="card-cvc" class="text-sm text-gray-800 bg-white rounded-r leading-5 py-2 px-3 placeholder-gray-400 w-full border border-transparent focus:border-indigo-300 focus:ring-0" type="text" placeholder="CVC" aria-label="CVC" />
                            </div>
                        </div>
                        <button type="submit" class="font-semibold text-sm inline-flex items-center justify-center px-3 py-2 border border-transparent rounded leading-5 shadow transition duration-150 ease-in-out w-full bg-indigo-500 hover:bg-indigo-600 text-white focus:outline-none focus-visible:ring-2">Pay Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    let x = Math.floor((Math.random() * 100000) + 1);
    document.getElementById("invoice").innerHTML = x;
</script>

</body>

<html>