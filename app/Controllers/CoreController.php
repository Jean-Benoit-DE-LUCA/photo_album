<?php

namespace App\Controllers;

use App\Models\AccessListFolder\AccessList;

class CoreController {

    protected function userLoggedAdmin() {
        $adminLogged = AccessList::admin();
        if ($adminLogged !== true) {
            $this->show($adminLogged);
            die();
        }
    }

    protected function userLoggedMember() {
        $memberLogged = AccessList::member();
        if ($memberLogged !== true) {
            $this->show($memberLogged);
            die();
        }
    }

    protected function userLoggedInvite() {
        $inviteLogged = AccessList::invite();
        //true / false //
        return $inviteLogged;
    }

    protected function show($viewPage, $viewData = []) {

        include $_SERVER["DOCUMENT_ROOT"] . "/www/php/photo_album/app/views/layout/header.tpl.php";
        include $_SERVER["DOCUMENT_ROOT"] . "/www/php/photo_album/app/views/" . $viewPage . ".tpl.php";
        include $_SERVER["DOCUMENT_ROOT"] . "/www/php/photo_album/app/views/layout/footer.tpl.php";
    }
}