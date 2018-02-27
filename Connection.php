<?php

class Connection {

    private static $conn;

    public static function Connectar() {

        try {

            self::$conn = new PDO("mysql:host=localhost;port=3306;dbname=nfe;", "root", "");
        } catch (PDOException $e) {
            echo 'Error : ' . $e->getMessage();
        }
        return self::$conn;
    }

}
