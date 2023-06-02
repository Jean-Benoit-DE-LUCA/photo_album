<?php if (array_key_exists("error", $viewData)) : ?>
    <div class="error_subscribe error_subscribe_photos_add">
        <p><?php echo $viewData["error"]; ?></p>        
    </div>
<?php endif; ?>

<?php if (array_key_exists("success", $viewData)) : ?>
    <div class="error_subscribe error_subscribe_photos_add success_alert">
        <p><?php echo $viewData["success"]; ?></p>        
    </div>
<?php endif; ?>

<main class="messages">
    <h3>Photo Box</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="name" class="label_photo_name">Photo name:</label>
        <input type="text" name="name" id="name">
        <label for="file" class="label_file">File</label>
        <input type="file" name="data_file" id="file" class="input_file">
            <p class="file_name_input">No file chosen</p>
        <input type="hidden" name="token" id="token" value="<?php echo $_SESSION["userToken"]; ?>">
        <button type="submit" name="submit" class="file_submit" id="butt_sub">Submit</button>
    </form>
</main>