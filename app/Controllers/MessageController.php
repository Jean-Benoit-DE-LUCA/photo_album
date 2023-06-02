<?php

namespace App\Controllers;

use App\Models\Message;

class MessageController extends CoreController {

    public function addMessageAction() {

        $this->userLoggedInvite();

        $tokenCsrf = bin2hex(random_bytes(32));
        $_SESSION["userToken"] = $tokenCsrf;
        
        $this->show("messages/messages-add");
    }

    public function postMessageAction() {

        if (isset($_POST)) {
            
            $name = htmlspecialchars(htmlspecialchars($_POST["name"]));
            $message = htmlspecialchars(htmlspecialchars($_POST["message"]));
            $tokenCsrf = $_POST["token"];

            $errorList = [];

            if (isset($_SESSION["userId"])) {

                $userId = $_SESSION["userId"];

                if ($tokenCsrf == $_SESSION["userToken"]) {

                    if(!empty($name) && !empty($message)) {
                        $postMessage = Message::send($message, $userId);
                        header("Location: " . $_ENV["url"]);
                    } else {

                        $errorList["error"] = "Empty name or message.";
                        $this->show("messages/messages-add", $errorList);
                    }

                }   else {

                    http_response_code(403);
                    $this->show("errors/error403");
                }             
            }
        }
    }

    public function deleteDelMessageAction($id) {

        $data = json_decode(file_get_contents("php://input"), true);
        
        $deleteMessage = Message::delete($data["id"]);
        
    }
}