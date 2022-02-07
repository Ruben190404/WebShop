<?php


include 'Product.php';

if (!empty($_GET['category'])) {
    $category = $_GET['category'];
}


$productDB = new Product();
?>

<?php include_once 'header.php'; ?>


    <!-- Onze Producten -->
    <section id="webshop" class="m-1 mt-5">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md">
                    <img src="images/indian1.png" class="img-fluid rounded-pill" alt="">
                </div>
                <div class="col-md ms-3">
                    <h2>De <?php echo ($_GET['category']) ?> Keuken</h2>
                    <p class="lead">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugiat, voluptates alias cupiditate doloribus fuga exercitationem.
                    </p>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Esse ex asperiores, ab sit autem quidem quo animi sapiente blanditiis laborum, sint, mollitia incidunt exercitationem sed eos quisquam earum velit dolore?
                    </p>
                </div>
            </div>
            <form method="get">
                <select class="form-select w-25 text-center position-static mt-3" name="category" aria-label="Default select example" onchange='if(this.value != 0) { this.form.submit(); }'>
                    <option value="0">Kies Categorie</option>
                    <option value="indian">Indiaas</option>
                    <option value="japanese">Japans</option>
                    <option value="chinese">Chinees</option>
                    <option value="thai">Thais</option>
                    <option value="vietnam">Vietnamees</option>
                    <option value="supplies">Benodigheden</option>
                </select>
            </form>
        </div>
    </section>

    <!-- Boxes -->

    <section class="p-1 p-sm-3 p-md-4 p-lg-5 mt-2 mt-lg-0">
        <div class="container">
            <div class="row text-center g-3">
                <?php
                $products = $productDB->getAllByCategory($category);
                foreach ($products as $product) {
                    $total = ($product['price']);
                    ?>
                    <div class="col col-md-6 col-lg-3">
                        <div class="card bg-dark text-light">
                            <div class="card-body text-center">
                                <img src="<?= $product['picture'];?>" alt="" class="img-fluid">
                                <h3 class="card-title mb-3">
                                    <h1><?= $product['name']; ?></h1>
                                </h3>
                                <p><?= '&euro;&nbsp;' . number_format($total, 2, ',', '.') . ' <br>'; ?></p>
                                <p class="card-text">
                                <p><?= $product['description']; ?></p>
                                </p>
                                <form method="post">
                                    <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
                                    <button class="btn btn-warning" type="submit">In Winkelmandje</button>
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

<?php include_once 'footer.php'; ?>
