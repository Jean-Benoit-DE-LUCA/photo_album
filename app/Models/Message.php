<?php

namespace App\Models;

use App\Models\DatabaseFolder\Database;
use PDO;

class Message extends CoreModel {
    
    private $content;
    private $user_id;
    private $date;

    public static function findAllInvite() {
        $pdo = Database::getPdo();
        $sql = "SELECT `message`.*, `user`.`name` FROM `message` INNER JOIN `user` ON `message`.`user_id` = `user`.`id` WHERE `message`.`user_id` = ? OR `message`.`user_id` = ? OR `message`.`user_id` = ? ORDER BY `message`.`date` DESC;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([2, 3, 4]);
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
        return $result;
    }

    public static function findById($id) {
        $pdo = Database::getPdo();
        $sql = "SELECT `message`.*, `user`.`name` FROM `message` INNER JOIN `user` ON `message`.`user_id` = `user`.`id` WHERE `message`.`user_id` = ? ORDER BY `message`.`date` DESC;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
        return $result;
    }

    public static function findAll() {
        $pdo = Database::getPdo();
        $sql = "SELECT `message`.*, `user`.`name` FROM `message` INNER JOIN `user` ON `message`.`user_id` = `user`.`id` ORDER BY `message`.`date` DESC;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
        return $result;
    }

    public static function send($content, $userId) {
        $pdo = Database::getPdo();
        $sql = "INSERT INTO `message` (content, user_id) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$content, $userId]);
    }

    public static function delete($idMessage) {
        $pdo = Database::getPdo();
        $sql = "DELETE FROM `message` WHERE `message`.`id` = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$idMessage]);
    }

    public function getContent() {
        return $this->content;
    }

    public function setContent($setCont) {
        $this->content = $setCont;
        return $this;
    }

    public function getDate() {
        return $this->date;
    }
}