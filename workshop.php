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

    <!-- Showcase -->

    <section class="bg-dark text-light p-5 text-center text-sm-start">
        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-between">
                <div>
                    <h1><span class="text-warning">Wok & Roll</span> workshop's!</h1>
                    <p class="lead my-4">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ab quaerat maxime culpa possimus mollitia, a id numquam corporis! Natus quidem illum architecto nam sit fugiat doloribus at nemo laborum earum quae molestias odio vel porro autem nisi aliquam recusandae, sint blanditiis minus quia quibusdam esse? Esse iusto distinctio commodi voluptatem.
                    </p>
                </div>
                <img class="img-fluid w-50 d-none d-sm-block ps-3" src="images/WOK&rollBanner(1000x500px).svg" alt="">
            </div>
        </div>
    </section>

    <!-- Workshop 1 -->

    <section id="workshop" class="p-5 bg-white text-dark">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md p5">
                    <h2>Workshop 1</h2>
                    <p class="lead">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugiat, voluptates alias cupiditate doloribus fuga exercitationem.
                    </p>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Esse ex asperiores, ab sit autem quidem quo animi sapiente blanditiis laborum, sint, mollitia incidunt exercitationem sed eos quisquam earum velit dolore?
                    </p>
                </div>
                <div class="col-md">
                    <img src="images/asian3.jpg" class="img-fluid rounded" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- Workshop 2 -->

    <section id="workshop" class="p-5 bg-dark text-light">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md">
                    <img src="images/asian3.jpg" class="img-fluid rounded" alt="">
                </div>
                <div class="col-md p5">
                    <h2>Workshop 2</h2>
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

    <!-- Workshop 3 -->

    <section id="workshop" class="p-5 bg-white text-dark">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md p5">
                    <h2>Workshop 3</h2>
                    <p class="lead">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugiat, voluptates alias cupiditate doloribus fuga exercitationem.
                    </p>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Esse ex asperiores, ab sit autem quidem quo animi sapiente blanditiis laborum, sint, mollitia incidunt exercitationem sed eos quisquam earum velit dolore?
                    </p>
                </div>
                <div class="col-md">
                    <img src="images/asian3.jpg" class="img-fluid rounded" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->

    <footer class="p-5 bg-dark text-white text-center position-relative">
        <div class="container">
            <p class="lead">Copyright &copy; 2021 Wok&Roll</p>

            <a href="#" class="position-absolute bottom-0 end-0 p-5">
                <i class="bi bi-arrow-up-circle text-warning h1"></i>
            </a>
        </div>
    </footer>

    <!-- Modal -->
<div class="modal fade" id="klaas" tabindex="-1" aria-labelledby="klaasLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="klaasLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p class="lead">Fill out this form</p>
          <form action="">
              <div class="mb-3">
                  <label for="first-name" class="col-form-label">
                      First Name:
                  </label>
                  <input type="text" class="form-control" id="first-name">
              </div>
              <div class="mb-3">
                <label for="first-name" class="col-form-label">
                    Last Name:
                </label>
                <input type="text" class="form-control" id="last-name">
            </div>
            <div class="mb-3">
                <label for="first-name" class="col-form-label">
                    Email:
                </label>
                <input type="text" class="form-control" id="Email">
            </div>
            <div class="mb-3">
                <label for="first-name" class="col-form-label">
                    Phone Number:
                </label>
                <input type="text" class="form-control" id="phone-number">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
