<!DOCTYPE html>
<html lang="en">
<?php
session_start();

if (!isset($_SESSION['status'])) {
    $_SESSION['status'] = 0;
}
if (!isset($_SESSION['adminstatus'])) {
    $_SESSION['adminstatus'] = 0;
}
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
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
                <li class="nav-item">
                    <a href="adminPage.php" class="nav-link" <?php echo ($_SESSION['adminstatus'] == 0) ? 'style="display:none;"' : '' ?>>Product Beheer</a>
                    <a class="nav-link" <?php echo ($_SESSION['adminstatus'] == 1) ? 'style="display:none;"' : '' ?>>&nbsp;</a>
                </li>
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

    <!-- Showcase -->

    <section class="bg-dark text-light p-5 text-center text-sm-start mb-5">
        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-between">
                <div>
                    <h1>Welkom bij <span class="text-warning">Wok & Roll</span></h1>
                    <p class="lead my-4">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ab quaerat maxime culpa possimus
                        mollitia, a id numquam corporis! Natus quidem illum architecto nam sit fugiat doloribus at nemo
                        laborum earum quae molestias odio vel porro autem nisi arbeidsongeschickbaarheidsverzekeringsmaatschapij recusandae, sint blanditiis minus
                        quia quibusdam esse? Esse iusto distinctio commodi voluptatem.
                    </p>
                    <button class="btn btn-danger btn-lg "> <a href="register.php" class="text-white noline">Maak
                        een Account</a></button>
                </div>
                <img class="img-fluid w-50 d-none d-sm-block ps-3" src="images/banner.svg" alt="">
            </div>
        </div>
    </section>

    <!-- Onze Producten -->

    <section id="webshop" class="m-3">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md">
                    <img src="images/asian2.jpg" class="img-fluid rounded-pill" alt="">
                </div>
                <div class="col-md ms-3">
                    <h2>Onze Producten</h2>
                    <p class="lead">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugiat, voluptates alias cupiditate
                        doloribus fuga exercitationem.
                    </p>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Esse ex asperiores, ab sit autem
                        quidem quo animi sapiente blanditiis laborum, sint, mollitia incidunt exercitationem sed eos
                        quisquam earum velit dolore?
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Boxes -->

    <section class="p-1 p-sm-3 p-md-4 p-lg-5 mt-2 mt-lg-0">
        <div class="container">
            <div class="row text-center g-3">
                <div class="col-md">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                                <img src="images/indian600x600.jpg" alt="" class="img-fluid">
                            </div>
                            <h3 class="card-title mb-3">
                                Indiaas
                            </h3>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus illum molestias
                                distinctio sit similique atque.
                            </p>
                            <form action="product-page.php" method="get">
                                <button class="btn btn-warning" name="category" value="indian">Naar Producten</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md mx-2">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                                <img src="images/japanese600x600.jpg" alt="" class="img-fluid">
                            </div>
                            <h3 class="card-title mb-3">
                                Japans
                            </h3>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus illum molestias
                                distinctio sit similique atque.
                            </p>
                            <form action="product-page.php" method="get">
                                <button class="btn btn-warning" name="category" value="japanese">Naar Producten</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                                <img src="images/chinese600x600.jpg" alt="" class="img-fluid">
                            </div>
                            <h3 class="card-title mb-3">
                                Chinees
                            </h3>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus illum molestias
                                distinctio sit similique atque.
                            </p>
                            <form action="product-page.php" method="get">
                                <button class="btn btn-warning" name="category" value="chinese">Naar Producten</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container pt-4">
            <div class="row text-center g-3">
                <div class="col-md">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                                <img src="images/thai600x600.jpg" alt="" class="img-fluid">
                            </div>
                            <h3 class="card-title mb-3">
                                Thais
                            </h3>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus illum molestias
                                distinctio sit similique atque.
                            </p>
                            <form action="product-page.php" method="get">
                                <button class="btn btn-warning" name="category" value="thai">Naar Producten</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md mx-2">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                                <img src="images/vietnamese600x600.jpg" alt="" class="img-fluid">
                            </div>
                            <h3 class="card-title mb-3">
                                Vietnamees
                            </h3>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus illum molestias
                                distinctio sit similique atque.
                            </p>
                            <form action="product-page.php" method="get">
                                <button class="btn btn-warning" name="category" value="vietnam">Naar Producten</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                                <img src="images/supplies600x600.jpg" alt="" class="img-fluid">
                            </div>
                            <h3 class="card-title mb-3">
                                Supplies
                            </h3>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus illum molestias
                                distinctio sit similique atque.
                            </p>
                            <form action="product-page.php" method="get">
                                <button class="btn btn-warning" name="category" value="supplies">Naar Producten</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Workshop's -->

    <section id="workshop" class="pt-5 pb-3 bg-dark text-light">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md p5">
                    <h2>Workshop's</h2>
                    <p class="lead">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugiat, voluptates alias cupiditate
                        doloribus fuga exercitationem.
                    </p>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Esse ex asperiores, ab sit autem
                        quidem quo animi sapiente blanditiis laborum, sint, mollitia incidunt exercitationem sed eos
                        quisquam earum velit dolore?
                    </p>
                    <a href="workshop.php" class="btn btn-light mt-3">
                        <i class="bi bi-chevron-right"></i> Meer Informatie
                    </a>
                </div>
                <div class="col-md">
                    <img src="images/asian3.jpg" class="img-fluid rounded" alt="">
                </div>
            </div>
        </div>
    </section>

    <footer class="p-5 bg-dark text-white text-center position-relative">
        <div class="container">
            <p class="lead">Copyright &copy; 2022 Wok&Roll</p>

            <a href="#" class="position-absolute bottom-0 end-0 p-5">
                <i class="bi bi-arrow-up-circle text-warning h1"></i>
            </a>
        </div>
    </footer>

</body>

</html>
