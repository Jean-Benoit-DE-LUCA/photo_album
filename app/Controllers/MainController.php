<?php

namespace App\Controllers;

use App\Models\Message;
use App\Models\User;

class MainController extends CoreController {

    public function homeAction() {

        if ($this->userLoggedInvite()) {

            $findMessages = Message::findAllInvite();
            $findUsers = User::findAllInvite();
            
            $viewData = [
                "findMessages" => $findMessages,
                "findUsers" => $findUsers
            ];

            $this->show("main/home", $viewData);
        }

        else if (!$this->userLoggedInvite()) {

        $this->userLoggedMember();
        
        $findMessages = Message::findAll();
        $findUsers = User::findAll();
        $viewData = [
            "findMessages" => $findMessages,
            "findUsers" => $findUsers
        ];
        
        $this->show("main/home", $viewData);

        }
    
    }

    public function homeFilterAction() {

        if ($this->userLoggedInvite()) {
            
            if (isset($_POST["select_filter"])) {

                $id = $_POST["select_filter"];

                if ($id == "-") {
                    header("Location: " . $_ENV["url"]);
                }

                $findMessages = Message::findById($id);
                $findUsers = User::findAllInvite();
                $viewData = [
                    "findMessages" => $findMessages,
                    "findUsers" => $findUsers
                ];
                $this->show("main/home", $viewData);
            }
        }

        else if (!$this->userLoggedInvite()) {

            $this->userLoggedMember();

            if (isset($_POST["select_filter"])) {

                $id = $_POST["select_filter"];

                if ($id == "-") {
                    header("Location: " . $_ENV["url"]);
                }

                $findMessages = Message::findById($id);
                $findUsers = User::findAll();
                $viewData = [
                    "findMessages" => $findMessages,
                    "findUsers" => $findUsers
                ];
                $this->show("main/home", $viewData);
            }
        }
    }
}