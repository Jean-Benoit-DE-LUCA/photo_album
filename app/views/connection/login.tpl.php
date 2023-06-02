<?php if (array_key_exists("error", $viewData)) : ?>
    <div class="error_subscribe">
        <p><?php echo $viewData["error"]; ?></p>        
    </div>
<?php endif; ?>
    <main class="messages">
        <h3>Login</h3>
        <form action="" method="POST">
            <label for="name">Username:</label>
            <input type="text" name="name" id="name">
            <label for="password" class="password_label">Password:</label>
            <input type="password" name="password" id="password">
            <button type="submit" name="submit" class="submit_login">Submit</button>
        </form>
    </main>