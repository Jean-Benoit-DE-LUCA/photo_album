<?php if (array_key_exists("error", $viewData)) : ?>
    <div class="error_subscribe error_message">
        <p><?php echo $viewData["error"]; ?></p>        
    </div>
<?php endif; ?>
<main class="messages">
    <h3>Message Box</h3>
    <form action="" method="POST">
        <label for="name">Name:</label>
        <input type="hidden" name="name" id="name"
        <?php 
            if (!isset($_SESSION["userName"])) {
                echo "value='Invite'";
            } else {
                echo "value=" . $_SESSION["userName"];
            }
        ?>>
        <span class="span_message"><?php echo ucwords($_SESSION["userName"]); ?></span>
        <label for="message">Message:</label>
        <textarea name="message" id="message" rows="30" cols="30"></textarea>
        <input type="hidden" name="token" id="token" value="<?php echo $_SESSION["userToken"]; ?>">
        <button type="submit" name="submit" id="butt_sub">Submit</button>
    </form>
</main>
