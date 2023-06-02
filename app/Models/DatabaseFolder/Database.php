<?php

namespace App\Models\DatabaseFolder;

use PDO;

class Database {

    private $pdo;
    private static $_instance;

    private function __construct() {
        $config = parse_ini_file("../app/config.ini");
        try {
            $this->pdo = new PDO("mysql:host=" . $config["DB_HOST"] . ";dbname=" . $config["DB_NAME"], $config["DB_USER"], $config["DB_PASS"]);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {
            echo "Connection error: " . $e->getMessage();
        }
    }

    public static function getPdo() {
        if (empty(self::$_instance)) {
            self::$_instance = new Database();
        }
        return self::$_instance->pdo;
    }
}