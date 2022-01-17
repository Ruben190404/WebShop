<?php
class Database {
    public function connect() {
        try {
            $connection = new PDO("mysql:host=127.0.0.1;dbname=login", 'root', '');
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }  catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            exit;
        }
        return $connection;
    }
}