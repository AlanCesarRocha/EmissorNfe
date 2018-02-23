<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Connection
 *
 * @author Alan
 */
class Connection {

    private static $conn;

    public static function Connectar() {

        try {
            if (self::$conn) {
                self::$conn = new PDO("mysql:host=localhost;port=3306;dbname=nfe;", "root", "");
                return self::$conn;
            }
        } catch (PDOException $e) {
            echo 'Error : ' . $e->getMessage();
        }
    }

    //put your code here
}
