<?php

namespace App\Controllers;

use App\Models\Photo;
use App\Models\User;

class PhotosController extends CoreController {

    public function randomPhotoAction() {

        if ($this->userLoggedInvite()) {

            $allPhotos = Photo::findAllInvite();
            $viewData = [
                "allPhotos" => $allPhotos
            ];
            $this->show("photos/photos-random", $viewData);

        } else if (!$this->userLoggedInvite()) {

            $allPhotos = Photo::findAll();
            $viewData = [
            "allPhotos" => $allPhotos
            ];
            $this->show("photos/photos-random", $viewData);
            
        }
    }

    public function seePhotosAction() {

        if ($this->userLoggedInvite()) {

            $allPhotos = Photo::findAllInvite();
            $allUsers = User::findAllInvite();

            $viewData = [
                "allPhotos" => $allPhotos,
                "findUsers" => $allUsers
            ];
            $this->show("photos/see", $viewData);

        } else if (!$this->userLoggedInvite()) {

            $allPhotos = Photo::findAll();
            $allUsers = User::findAll();
            $viewData = [
                "allPhotos" => $allPhotos,
                "findUsers" => $allUsers
            ];

            $this->show("photos/see", $viewData);   

        }
    }

    public function seePhotosFilterAction() {

        if ($this->userLoggedInvite()) {

            if (isset($_POST["select_filter"])) {

                $id = $_POST["select_filter"];
    
                if ($id == "-") {
                    header("Location: " . $_ENV["url"] . "photos");
    
                } 
    
                $allPhotos = Photo::findById($id);
                $findUsers = User::findAllInvite();
                $viewData = [
                    "allPhotos" => $allPhotos,
                    "findUsers" => $findUsers
                ];
                $this->show("photos/see", $viewData);
            }

        } else if (!$this->userLoggedInvite()) {

            if (isset($_POST["select_filter"])) {

                $id = $_POST["select_filter"];
    
                if ($id == "-") {
                    header("Location: " . $_ENV["url"] . "photos");
    
                } 
    
                $allPhotos = Photo::findById($id);
                $findUsers = User::findAll();
                $viewData = [
                    "allPhotos" => $allPhotos,
                    "findUsers" => $findUsers
                ];
                $this->show("photos/see", $viewData);
            }
        }
        
        
    }

    public function addPhotosAction() {

        $this->userLoggedInvite();

        $tokenCsrf = bin2hex(random_bytes(32));
        $_SESSION["userToken"] = $tokenCsrf;

        $this->show("photos/photos-add");

    }

    public function postPhotosAction() {

        if (isset($_POST["submit"])) {
            
            if (empty($_FILES["data_file"]["name"])) {

                $errorList["error"] = "Please add a file before submit.";
                $viewData = [
                    "error" => $errorList
                ];

                $this->show("photos/photos-add", $errorList);
                die();
            }
            
            if (!empty($_POST["name"])) {

                $imageName = $_POST["name"];
                $path = "./assets/uploads/" . $imageName . substr($_FILES["data_file"]["name"], strrpos($_FILES["data_file"]["name"], "."));

            } else {

                $imageName = $_FILES["data_file"]["name"];
                $path = "./assets/uploads/" . $imageName;

            }
            
            $imageFile = $_FILES["data_file"]["name"];
            $imageType = $_FILES["data_file"]["type"];
            $imageSize = $_FILES["data_file"]["size"];
            $imageTmp = $_FILES["data_file"]["tmp_name"];
            
            $errorList = [];
            $successList = [];

            if ($imageType == "image/jpeg" || $imageType == "image/jpg" || $imageType == "image/png" || $imageType == "image/gif") {
                
                if (!file_exists($path)) {

                    if ($imageSize < 5000000) {

                        if ($_SESSION["userToken"] == $_POST["token"]) {

                            if (move_uploaded_file($imageTmp, $path)) {

                                $upload = Photo::uploadPhoto($_SESSION["userId"], $imageName, $path);

                                $successList["success"] = "Photo uploaded successfully.";

                                $this->show("photos/photos-add", $successList);
                            }
                        
                        } else {

                            http_response_code(498);
                            $this->show("errors/error498");
                        }

                    } else {

                        $errorList["error"] = "Exceed file size (>5mb).";
                        $viewData = [
                            "error" => $errorList
                        ];

                        $this->show("photos/photos-add", $errorList);
                    }   

                } else {

                    $errorList["error"] = "File already exists.";
                    $viewData = [
                        "error" => $errorList
                    ];

                    $this->show("photos/photos-add", $errorList);
                }

            } else {

                $errorList["error"] = "File format not supported.";
                $viewData = [
                    "error" => $errorList
                ];

                $this->show("photos/photos-add", $errorList);

            }
        }
    }
}