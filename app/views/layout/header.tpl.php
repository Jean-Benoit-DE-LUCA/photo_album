<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Homemade+Apple&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $_ENV["url"]; ?>assets/css/style.css">
    <title>DE LUCA FERNANDEZ FAMILY</title>
</head>
<body>

    <nav>
        <ul>
            <li><a href="<?php echo substr($_SERVER["PHP_SELF"], 0, -9); ?>">Home</a></li>
            <li>
                <a href="" class="message_menu">Message</a><span class="arrow arrow_one">&#8679;</span>
                <li class="add_li"><a href="<?php echo $_ENV["url"]; ?>messages/add" class="add_a">Add</a></li>
            </li>
            <li class="pictures_li">
                <a href="" class="pictures_menu">Photos</a><span class="arrow arrow_two">&#8679;</span>
                <ul class="submenu_pictures">
                    <li id="submenu_pictures_first_li"><a href="<?php echo substr($_SERVER["PHP_SELF"], 0, -9) . "photos/add" ?>">Add</a></li>
                    <li id="submenu_pictures_second_li"><a href="<?php echo substr($_SERVER["PHP_SELF"], 0, -9) . "photos" ?>">See</a></li>
                    <li id="submenu_pictures_third_li"><a href="<?php echo substr($_SERVER["PHP_SELF"], 0, -9) . "photos/random" ?>">Random</a></li>
                </ul>
            </li>
            <li><a href="<?php echo $_ENV["url"]; ?>logout">Logout</a></li>
        </ul>
    </nav>
    <div class="container">
        <header>            
            <div class="header_img">
                <a href="<?php echo $_ENV["url"]; ?>"><img src="<?php echo $_ENV["url"]; ?>assets/images/logo-black-trans.png"></a>
                <h1>DE LUCA FERNANDEZ FAMILY</h1>
            </div>
            <div class="burger">
                <span></span>
            </div>
            <div class="title_profile">
                <?php if (isset($_SESSION["userName"])) : ?>
                    <p>
                        Welcome <?php echo ucwords($_SESSION["userName"]); ?>
                    </p>
                <?php endif; ?>
            </div>
        </header>
        <div class="moon_sun_box">
            <span>&#9789;</span>
        </div>