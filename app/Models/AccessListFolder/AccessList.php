<?php

namespace App\Models\AccessListFolder;

class AccessList {

    private static $admin;
    private static $member;
    private static $invite;

    public static function admin() {

        if (!isset($_SESSION["userName"])) {
            header("Location: " . $_ENV["url"] . "login");
            die();
        }

        if ($_SESSION["userObj"]->role == "admin") {
            self::$admin = true;
            return self::$admin;

        } else {
            $viewPage = "errors/error403";
            return $viewPage;
        }
    }

    public static function member() {

        if (!isset($_SESSION["userName"])) {
            header("Location: " . $_ENV["url"] . "login");
            die();
        }

        if ($_SESSION["userObj"]->role == "admin" || $_SESSION["userObj"]->role == "member") {
            self::$admin = true;
            self::$member = true;
            return self::$member;

        } else {
            $viewPage = "errors/error403";
            return $viewPage;
        }
    }

    public static function invite() {

        if (!isset($_SESSION["userName"])) {
            header("Location: " . $_ENV["url"] . "login");
            die;
        }

        if ($_SESSION["userObj"]->role == "invite") {
            self::$invite = true;
            return self::$invite;
        } else {
            return false;
        }
    }
}