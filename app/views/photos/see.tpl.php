<h2 class="photos_see_h2">Photos</h2>
<div class="filter_box_container filter_box_container_photos">
    <div class="filter_box filter_box_photos">
        <div class="filter_title_box">
            <p class="filter_title">Filters</p>
            <span class="arrow arrow_filter">&#8679;</span>
        </div>
        <p class="users_label">Users:</p>
        <form action="" method="POST">
            <select name="select_filter" class="filter_select" id="filter_id">
                <option value="-">-</option>
                <?php foreach ($viewData["findUsers"] as $currentUser) : ?>
                    <option value="<?php echo $currentUser->getId(); ?>"><?php echo ucwords($currentUser->getName()); ?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" class="filter_select_submit" name="submit" value="Submit">
        </form>
    </div>    
</div>
<main class="photos_see">
    <?php foreach ($viewData["allPhotos"] as $currentPhoto) : ?>
        <div class="photo_grid_item">
            <img src="<?php echo $currentPhoto->getImage(); ?>">
        </div>
    <?php endforeach; ?>
</main>