<h2 class="random_title">A random moment...</h2>
<main class="carousel">
    <?php foreach ($viewData["allPhotos"] as $currentPhoto) : ?>
        <img src="<?php echo $_ENV["url"] . $currentPhoto->getImage(); ?>">
    <?php endforeach; ?>
    <button class="random_butt">⥂</button>
</main>