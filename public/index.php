<?php

$_ENV["url"] = substr($_SERVER["REQUEST_URI"], 0, 28);

require "../vendor/autoload.php";

session_start();

if (isset($_SESSION["userTime"])) {
    if (time() - $_SESSION["userTime"] > 3600) {
        header("Location: " . $_ENV["url"] . "logout");
    }
}

$router = new AltoRouter();
$router->setBasePath(substr($_SERVER["REQUEST_URI"], 0, 27));

$router->map(
    "GET",
    "/",
    [
        "controller" => "MainController",
        "method" => "homeAction"
    ],
    "home"
);

$router->map(
    "POST",
    "/",
    [
        "controller" => "MainController",
        "method" => "homeFilterAction"
    ],
    "home-filter"
);

$router->map(
    "GET",
    "/messages/add",
    [
        "controller" => "MessageController",
        "method" => "addMessageAction"
    ],
    "messages-add"
);

$router->map(
    "POST",
    "/messages/add",
    [
        "controller" => "MessageController",
        "method" => "postMessageAction"
    ],
    "messages-add-post"
);

$router->map(
    "DELETE",
    "/messages/delete/[i:id]",
    [
        "controller" => "MessageController",
        "method" => "deleteDelMessageAction"
    ],
    "messages-delete-id"
);

$router->map(
    "GET",
    "/subscribe",
    [
        "controller" => "ConnectionController",
        "method" => "subscribeAction"
    ],
    "subscribe"
);

$router->map(
    "POST",
    "/subscribe",
    [
        "controller" => "ConnectionController",
        "method" => "postSubscribeAction"
    ],
    "subscribe-post"
);

$router->map(
    "GET",
    "/login",
    [
        "controller" => "ConnectionController",
        "method" => "loginAction"
    ],
    "login"
);

$router->map(
    "POST",
    "/login",
    [
        "controller" => "ConnectionController",
        "method" => "loginPostAction"
    ],
    "login-post"
);

$router->map(
    "GET",
    "/logout",
    [
        "controller" => "ConnectionController",
        "method" => "logoutAction"
    ],
    "logout"
);

$router->map(
    "GET",
    "/photos/add",
    [
        "controller" => "PhotosController",
        "method" => "addPhotosAction"
    ],
    "photos-add"
);

$router->map(
    "POST",
    "/photos/add",
    [
        "controller" => "PhotosController",
        "method" => "postPhotosAction"
    ],
    "photos-add-post"
);

$router->map(
    "GET",
    "/photos",
    [
        "controller" => "PhotosController",
        "method" => "seePhotosAction"
    ],
    "photos-see"
);

$router->map(
    "POST",
    "/photos",
    [
        "controller" => "PhotosController",
        "method" => "seePhotosFilterAction"
    ],
    "photos-see-filter"
);

$router->map(
    "GET",
    "/photos/random",
    [
        "controller" => "PhotosController",
        "method" => "randomPhotoAction"
    ],
    "photos-random"
);

$match = $router->match();

if ($match) {

    $currentController = "App\\Controllers\\" . $match["target"]["controller"];
    $method = $match["target"]["method"];
    $params = $match["params"];

} else {

    $currentController = "App\\Controllers\\ErrorController";
    $method = "error404Action";
    $params = [];
}

$controller = new $currentController();
$controller->$method($params);

?>