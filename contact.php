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

    <!-- Question Accordion -->

    <section class="p-5">
        <div class="container">
            <h1 class="text-center mb-3">Veel Gestelde Vragen</h1>
            <div class="accordion accordion-flush">

                <!-- Item 1 -->

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#question-one">
                            vraag 1
                        </button>
                    </h2>
                    <div id="question-one" class="accordion-collapse collapse" data-bs-parent="#questions">
                        <div class="accordion-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque
                            beatae voluptates ratione voluptate recusandae? Repudiandae, placeat accusantium fugit velit
                            quia amet, impedit fugiat modi labore explicabo rem, vitae molestias et reiciendis animi
                            aliquam omnis ab consectetur accusamus possimus temporibus quas suscipit nam? Ab sed illo
                            accusamus est veniam, asperiores nulla?</div>
                    </div>
                </div>

                <!-- Item 2 -->

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#question-two">
                            vraag 2
                        </button>
                    </h2>
                    <div id="question-two" class="accordion-collapse collapse" data-bs-parent="#questions">
                        <div class="accordion-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque
                            beatae voluptates ratione voluptate recusandae? Repudiandae, placeat accusantium fugit velit
                            quia amet, impedit fugiat modi labore explicabo rem, vitae molestias et reiciendis animi
                            aliquam omnis ab consectetur accusamus possimus temporibus quas suscipit nam? Ab sed illo
                            accusamus est veniam, asperiores nulla?</div>
                    </div>
                </div>

                <!-- Item 3 -->

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#question-three">
                            vraag 3
                        </button>
                    </h2>
                    <div id="question-three" class="accordion-collapse collapse" data-bs-parent="#questions">
                        <div class="accordion-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque
                            beatae voluptates ratione voluptate recusandae? Repudiandae, placeat accusantium fugit velit
                            quia amet, impedit fugiat modi labore explicabo rem, vitae molestias et reiciendis animi
                            aliquam omnis ab consectetur accusamus possimus temporibus quas suscipit nam? Ab sed illo
                            accusamus est veniam, asperiores nulla?</div>
                    </div>
                </div>

                <!-- Item 4 -->

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#question-four">
                            vraag 4
                        </button>
                    </h2>
                    <div id="question-four" class="accordion-collapse collapse" data-bs-parent="#questions">
                        <div class="accordion-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque
                            beatae voluptates ratione voluptate recusandae? Repudiandae, placeat accusantium fugit velit
                            quia amet, impedit fugiat modi labore explicabo rem, vitae molestias et reiciendis animi
                            aliquam omnis ab consectetur accusamus possimus temporibus quas suscipit nam? Ab sed illo
                            accusamus est veniam, asperiores nulla?</div>
                    </div>
                </div>

                <!-- Item 5 -->

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#question-five">
                            vraag 5
                        </button>
                    </h2>
                    <div id="question-five" class="accordion-collapse collapse" data-bs-parent="#questions">
                        <div class="accordion-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque
                            beatae voluptates ratione voluptate recusandae? Repudiandae, placeat accusantium fugit velit
                            quia amet, impedit fugiat modi labore explicabo rem, vitae molestias et reiciendis animi
                            aliquam omnis ab consectetur accusamus possimus temporibus quas suscipit nam? Ab sed illo
                            accusamus est veniam, asperiores nulla?</div>
                    </div>
                </div>
            </div>
            <h3 class="text-center pt-2">Is uw vraag niet beantwoord?</h3>

        </div>
    </section>

    <!-- Contact Form -->

    <div class="container pb-5"> <div class="text-center">
        <h1>Neem contact met ons op</h1>
    </div>
        <div class="row ">
            <div class="col-lg-7 mx-auto">
                <div class="card mt-2 mx-auto pt-3 pb-1 bg-light">
                    <div class="card-body bg-light">
                        <div class="container">
                            <form id="contact-form" role="form">
                                <div class="controls">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group"> <label for="form_name">Voornaam</label> <input id="form_name" type="text" name="name" class="form-control" placeholder="Uw Voornaam" required="required" data-error="U moet een voornaam invullen."> </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group"> <label for="form_lastname">Achternaam</label> <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Uw Achternaam" required="required" data-error="U moet een achternaam invullen."> </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group"> <label for="form_email">Email</label> <input id="form_email" type="email" name="email" class="form-control" placeholder="Uw Email" required="required" data-error="U moet een email adres invullen."> </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group"> <label for="form_need">Waar gaat uw vraag over?</label> <select id="form_need" name="need" class="form-control" required="required" data-error="Selecteer een probleem.">
                                                <option value="" selected disabled>--Selecteer Uw Probleem--</option>
                                                <option>Vragen over producten</option>
                                                <option>Status van uw bestelling</option>
                                                <option>Vragen over terugbetalingen</option>
                                                <option>Anders</option>
                                            </select> </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group"> <label for="form_message">Bericht</label> <textarea id="form_message" name="message" class="form-control" placeholder="Schrijf hier uw Bericht." rows="4" required="required" data-error="Please, leave us a message."></textarea> </div>
                                        </div>
                                        <div class="col-md-12 pt-2"> <input type="submit" class="btn btn-light border-secondary btn-send pt-2 btn-block " value="Verstuur Bericht"> </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer -->

    <footer class="p-5 bg-dark text-white text-center position-relative">
        <div class="container">
            <p class="lead">Copyright &copy; 2021 Wok&Roll</p>

            <a href="#" class="position-absolute bottom-0 end-0 p-5">
                <i class="bi bi-arrow-up-circle text-warning h1"></i>
            </a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>