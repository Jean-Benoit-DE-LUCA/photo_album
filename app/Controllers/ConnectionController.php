<?php

namespace App\Controllers;

use App\Models\User;

class ConnectionController extends CoreController {

    public function logoutAction() {

        $this->show("connection/logout");
    }

    public function loginAction() {

        $this->show("connection/login");
    }

    public function loginPostAction() {
        
        if (isset($_POST["submit"])) {
            $name = $_POST["name"];
            $password = $_POST["password"];
            $errorList = [];

            if (empty($name) || empty($password)) {
                $errorList["error"] = "Empty username or password.";
                $this->show("connection/login", $errorList);
                die();
            }

            $findUser = User::find($name);

            if (!$findUser) {
                $errorList["error"] = "User not found.";
                $this->show("connection/login", $errorList);

            } else {

                if (!empty($name) && !empty($password)) {

                    if (!password_verify($password, $findUser->password)) {
                        $errorList["error"] = "Unvalid password.";
                        $this->show("connection/login", $errorList);

                    } else {                        
                        $_SESSION["userId"] = $findUser->id;
                        $_SESSION["userName"] = $findUser->name;
                        $_SESSION["userObj"] = $findUser;
                        $_SESSION["userTime"] = time();

                        header("Location: " . $_ENV["url"]);
                    }
                }
            }           
        }
    }

    public function subscribeAction() {  

        $this->userLoggedAdmin();
        $this->show("connection/subscribe");
    }

    public function postSubscribeAction() {

        if (isset($_POST["submit"])) {
            $name = $_POST["name"];
            $password = $_POST["password"];
            $errorList = [];

            if (!empty($name) && !empty($password)) {                
                $password = password_hash($password, PASSWORD_DEFAULT);
                $checkUserDb = User::checkUser($name, $password);

                if (!$checkUserDb) {
                    $errorList["error"] = "User already registered.";
                    $this->show("connection/subscribe", $errorList);

                } else {
                    $_SESSION["userId"] = $checkUserDb->id;
                    $_SESSION["userName"] = $checkUserDb->name;
                    $_SESSION["userObj"] = $checkUserDb;
                    $_SESSION["userTime"] = time();
                    
                    header("Location: " . $_ENV["url"]);
                }
            } else {
                $errorList["error"] = "Empty username or password.";
                $this->show("connection/subscribe", $errorList);

            }
        }
    }
}