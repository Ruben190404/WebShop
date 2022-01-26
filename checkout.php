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
                    <svg class="inline-flex -mt-9 w-[72px] h-[72px] fill-current rounded-full border-4 border-white box-content shadow mb-3" viewBox="0 0 72 72">
                        <path class="text-gray-700" d="M0 0h72v72H0z" />
                        <path class="text-pink-400" d="M30.217 48c.78-.133 1.634-.525 2.566-1.175.931-.65 1.854-1.492 2.769-2.525a30.683 30.683 0 0 0 2.693-3.575c.88-1.35 1.66-2.792 2.337-4.325-1.287 3.3-1.93 5.9-1.93 7.8 0 2.467.914 3.7 2.743 3.7.508 0 1.084-.083 1.727-.25.644-.167 1.169-.383 1.575-.65-.474-.267-.812-.708-1.016-1.325-.203-.617-.305-1.392-.305-2.325 0-.833.11-1.817.33-2.95.22-1.133.534-2.35.94-3.65.407-1.3.898-2.658 1.474-4.075A71.574 71.574 0 0 1 48 28.45c0-.167-.127-.35-.381-.55a5.313 5.313 0 0 0-.94-.575 6.394 6.394 0 0 0-1.245-.45 4.925 4.925 0 0 0-1.194-.175 110.56 110.56 0 0 1-2.49 4.8c-.44.8-.872 1.567-1.295 2.3-.423.733-.804 1.4-1.143 2-1.83 3.033-3.387 5.275-4.675 6.725-1.287 1.45-2.421 2.275-3.404 2.475-.474-.167-.711-.567-.711-1.2 0-1.533.373-3.183 1.118-4.95a23.24 23.24 0 0 1 2.87-4.975c1.169-1.55 2.473-2.875 3.913-3.975s2.836-1.75 4.191-1.95c-.034-.3-.186-.658-.457-1.075a8.072 8.072 0 0 0-.99-1.225c-.39-.4-.797-.75-1.22-1.05-.424-.3-.805-.5-1.143-.6-1.39.067-2.829.692-4.319 1.875-1.49 1.183-2.87 2.658-4.14 4.425a26.294 26.294 0 0 0-3.126 5.75C26.406 38.117 26 40.083 26 41.95c0 1.733.39 3.158 1.169 4.275.779 1.117 1.795 1.708 3.048 1.775Z" />
                    </svg>
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