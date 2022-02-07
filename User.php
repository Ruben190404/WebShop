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
                    $_SESSION['status'] = 1;
                    if ($result['admin'] == '1'){
                        $_SESSION['adminstatus'] = 1;
                    }

                    Header("Location: index.php");
                    exit;

                } else {
                    echo 'Uw wachtwoord of e-mailadres is onjuist';
                }
            } else {
                echo 'Uw wachtwoord of e-mailadres is onjuist';
            }


        } else {
            echo 'U bent niet ingelogd';
        }
    }

    public function register()
    {

        if (!isset($_POST['username'])) {
            echo 'Geen gebruikersnaam ingevuld';
            return;
        }

        if (!isset($_POST['password'])) {
            echo 'U hebt geen wachtwoord ingevuld';
            return;
        }

        if ($_POST['username'] === '' || !filter_var($_POST['username'], FILTER_VALIDATE_EMAIL)) {
            echo 'De gebruikersnaam is verkeerd ingevuld';
            return;
        }

        if ($_POST['password'] !== $_POST['password2']) {
            echo 'De wachtwoorden komen niet overeen';
            return;
        }

        //stap 1 verbinden met database
        $database = new Database();
        $connection = $database->connect();

        //stap 2 voor de query uit! BOOM!
        $queryStatement = $connection->prepare("INSERT INTO users (`name`, `password`) VALUES (:username, :password) ");
        $queryStatement->execute([':username' => $_POST['username'], ':password' => $_POST['password']]);
        Header("Location: index.php");
        exit;
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
