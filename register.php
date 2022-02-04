<?php
include 'User.php';

$user = new User();
?>




<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Registreren</title>
</head>


<body class="bg-dark">

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
                <li id="google_translate_element"></li>
                <script type="text/javascript">
                    function googleTranslateElementInit() {
                        new google.translate.TranslateElement({pageLanguage: 'nl'}, 'google_translate_element');
                    }
                </script>
                <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                <li class="nav-item">
                    <a href="workshop.html" class="nav-link">Workshop's</a>
                </li>
                <li class="nav-item">
                    <a href="contact.html" class="nav-link">Contact</a>
                </li>
                <li class="nav-item">
                    <a href="login.php" class="nav-link">login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div class="container mt-5 w-50">
<main class="form-signin mt-5 w-50 mx-auto border border-secondary rounded px-5 pt-5 pb-2">
    <form method="post">

        <div class="alert alert-info">
            <?php
            $user->register();
            ?>
        </div>

        <p class="h3 text-center text-light m-4">Registreer Hier</p>

        <div class="form-floating mb-2">
            <input type="email" class="form-control rounded" id="floatingInput" placeholder="name@example.com" name="username" required>
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control rounded" id="floatingPassword" placeholder="Password" name="password" required>
            <label for="floatingPassword">Password</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control rounded" id="floatingPassword1" placeholder="Password" name="password2" required>
            <label for="floatingPassword1">Password again</label>
        </div>

        <button class="w-50 btn btn-lg btn-dark border-secondary mx-auto d-block mt-3" type="submit">Register</button>
        <p class="mt-4 text-muted text-center">&copy; 2021 SD3</p>
    </form>
</main>
</div>
</body>

</html>