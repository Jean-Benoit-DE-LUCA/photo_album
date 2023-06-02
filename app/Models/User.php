<?php

namespace App\Models;

use App\Models\DatabaseFolder\Database;
use PDO;

class User extends CoreModel {

    private $name;

    public static function findAllInvite() {
        $pdo = Database::getPdo();
        $sql = "SELECT * FROM `user` WHERE `user`.`role` = ?;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["invite"]);
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
        return $result;
    }

    public static function findAll() {

        $pdo = Database::getPdo();
        $sql = "SELECT * FROM `user`";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
        return $results; 
    }

    public static function checkUser($name, $password, $role = "member") {

        $pdo = Database::getPdo();
        $sql = "SELECT * FROM `user` WHERE `user`.`name` = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name]);

        if (!$stmt->rowCount() > 0) {

            $pdo = Database::getPdo();
            $sql = "INSERT INTO `user` (name, password, role) VALUES (?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$name, $password, $role]);

            $findUser = User::find($name);
            return $findUser;

        } else {            
            return false;
        }

    }

    public static function find($name) {

        $pdo = Database::getPdo();
        $sql = "SELECT * FROM `user` WHERE `user`.`name` = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name]);
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    public function getName() {

        return $this->name;
    }

    public function setName($nameSet) {

        $this->name = $nameSet;
        return $this;
    }
}