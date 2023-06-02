<?php

namespace App\Controllers;

class ErrorController extends CoreController {

    public function error404Action() {

        http_response_code(404);
        $this->show("errors/error404");
    }
}