<?php
session_start();

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
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body class="text-center bg-dark">

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
        $user->login();

        ?>
        </div>

        <h1 class="h3 mb-3 fw-normal text-light">Log hier in</h1>

        <div class="form-floating">
            <input type="email" class="form-control mb-2" id="floatingInput" placeholder="name@example.com" name="username" required>
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control mb-3" id="floatingPassword" placeholder="Password" name="password" required>
            <label for="floatingPassword">Password</label>
        </div>

        <div class="checkbox mb-3 text-light">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="w-50 btn btn-lg btn-dark border-secondary" type="submit">Sign in</button>
        <a href="register.php" class="w-50 mt-3 btn btn-dark border-secondary btn-lg">Register</a>
        <p class="m-3 text-muted">&copy; 2021 SD3</p>
    </form>
</main>
</div>

</body>
</html>
