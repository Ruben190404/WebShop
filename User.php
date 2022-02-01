<?php
include "Database.php";

class User
{

    public function login()
    {
        $database = new Database();
        $connection = $database->connect();

        if (isset($_POST['username']) && isset($_POST['password'])) {

            $queryStatement = $connection->prepare("SELECT * FROM users WHERE name = :username ");
            $queryStatement->execute([':username' => $_POST['username']]);

            $result = $queryStatement->fetchAll();
            if (!empty($result)) {
                $result = $result[0];


                if ($_POST['username'] === $result['name'] && $_POST['password'] === $result['password']) {
                    echo 'U bent ingelogd';
                    $_SESSION['currentUser'] = $result['id'];
                    //doorsturen naar een goeie pagina als de login klopt
                    Header("Location: index.html");
                    exit;

                } else {
                    echo 'Uw wachtwoord of e-mailadres is onjuist';
                }
            } else {
                echo 'Uw wachtwoord of e-mailadres is onjuist';
            }


        } else {
            echo 'You are not logged in';
        }
    }

    public function register()
    {
        if (isset($_POST['username'])) {
            if ($_POST['username'] === '' || !filter_var($_POST['username'], FILTER_VALIDATE_EMAIL)) {
                echo 'De username is foutief ingevuld';
            } elseif ($_POST['password'] !== $_POST['password2']) {
                echo 'DE WACHTWOORDEN KOMEN NIET OVERHEEN';
            } elseif (!empty($_POST['username']) && !empty($_POST['password'])) {

                    //stap 1 verbinden met database
                    $database = new Database();
                    $connection = $database->connect();

                    //stap 2 voor de query uit! BOOM!
                    $queryStatement = $connection->prepare("INSERT INTO users (`name`, `password`) VALUES (:username, :password) ");
                    $queryStatement->execute([':username' => $_POST['username'], ':password' => $_POST['password']]);
                    Header("Location: index.html");


            }
        } elseif (!isset($_POST['username']) && !isset($_POST['password'])) {
            echo 'Please register';


        }
    }

    public function currentUser()
    {
        if (isset($_SESSION['currentUser'])) {
            return $_SESSION['currentUser'];
        } else {
            return false;
        }
    }

}


?>
