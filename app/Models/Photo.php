<?php

namespace App\Models;

use App\Models\DatabaseFolder\Database;
use PDO;

class Photo extends CoreModel {

    private $name_photo;
    private $image;
    private $user_id;

    public static function findById($id) {

        $pdo = Database::getPdo();
        $sql = "SELECT * FROM `photo` WHERE `photo`.`user_id` = ? ORDER BY `photo`.`date` DESC;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
        return $result;

    }

    public static function findAllInvite() {

        $pdo = Database::getPdo();
        $sql = "SELECT `photo`.`id`, `photo`.`name_photo`, `photo`.`image`, `photo`.`user_id` FROM `photo` INNER JOIN `user` ON `user`.`id` = `photo`.`user_id` WHERE `user`.`role` = ? ORDER BY `photo`.`date` DESC;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["invite"]);
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
        return $result;
    }

    public static function findAll() {

        $pdo = Database::getPdo();
        $sql = "SELECT * FROM `photo` ORDER BY `photo`.`date` DESC;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
        return $result;
    }

    public static function uploadPhoto($userId, $namePhoto, $imagePath) {

        $pdo = Database::getPdo();
        $sql = "INSERT INTO `photo` (name_photo, image, user_id) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$namePhoto, $imagePath, $userId]);
        
    }

    public function getNamePhoto() {

        return $this->name_photo;
    }

    public function setNamePhoto($namePhoto) {

        $this->name_photo = $namePhoto;
        return $this;
    }

    public function getImage() {

        return $this->image;
    }

    public function setImage($imagePath) {

        $this->image = $imagePath;
        return $this;
    }

    public function getUserId() {

        return $this->$user_id;
    }

    public function setUserId($userId) {

        $this->user_id = $userId;
        return $this;
    }
}