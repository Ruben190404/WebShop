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
    <link rel="stylesheet" href="styles.css">
    <title>Registreren</title>
</head>
<body>
<main class="form-signin">
    <form method="post">
        <img class="mb-4" src="2.jpg" alt="" width="72" height="57">

        <div class="alert alert-info">
            <?php
            $user->register();
            ?>
        </div>

        <h1 class="h3 mb-3 fw-normal">Please register</h1>

        <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="username" required>
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
            <label for="floatingPassword">Password</label>
        </div>

        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password2" required>
            <label for="floatingPassword">Password again</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2021 SD3</p>
    </form>
</main>
</body>

</html>