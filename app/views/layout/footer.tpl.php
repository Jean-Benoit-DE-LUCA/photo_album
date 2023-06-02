<?php if ($_SERVER["REQUEST_URI"] == $_ENV["url"] || $_SERVER["REQUEST_URI"] == $_ENV["url"] . "photos") : ?>
    <button type="button" class="back_top">&#8679;</button>
<?php endif; ?>

</div>

<?php if ($_SERVER["REQUEST_URI"] == $_ENV["url"]) : ?>
    <script src="<?php echo $_ENV["url"]; ?>assets/js/scrollTransitionHome.js"></script>
    <script src="<?php echo $_ENV["url"]; ?>assets/js/meteoApi.js"></script>
    <script src="<?php echo $_ENV["url"]; ?>assets/js/quoteApi.js"></script>
    <script src="<?php echo $_ENV["url"]; ?>assets/js/filterMessages.js"></script>
    <script src="<?php echo $_ENV["url"]; ?>assets/js/loadMore.js"></script>
    <script src="<?php echo $_ENV["url"]; ?>assets/js/darkMode.js"></script>
    <script src="<?php echo $_ENV["url"]; ?>assets/js/backTop.js"></script>
    <script src="<?php echo $_ENV["url"]; ?>assets/js/variables.js"></script>
    <script src="<?php echo $_ENV["url"]; ?>assets/js/deleteMessage.js"></script>
<?php endif; ?>

<?php if ($_SERVER["REQUEST_URI"] == $_ENV["url"] . "photos/random") : ?>
    <script src="<?php echo $_ENV["url"]; ?>assets/js/randomPhoto.js"></script>
<?php endif; ?>

<?php if ($_SERVER["REQUEST_URI"] == $_ENV["url"] . "photos") : ?>
    <script src="<?php echo $_ENV["url"]; ?>assets/js/scrollTransitionPhotoSee.js"></script>
    <script src="<?php echo $_ENV["url"]; ?>assets/js/bigPicturePhotoSee.js"></script>
    <script src="<?php echo $_ENV["url"]; ?>assets/js/filterMessages.js"></script>
    <script src="<?php echo $_ENV["url"]; ?>assets/js/loadMorePhoto.js"></script>
    <script src="<?php echo $_ENV["url"]; ?>assets/js/backTop.js"></script>
<?php endif; ?>

<?php if ($_SERVER["REQUEST_URI"] == $_ENV["url"] . "photos/add") : ?>
    <script src="<?php echo $_ENV["url"]; ?>assets/js/displayNameFile.js"></script>
<?php endif; ?>

<script src="<?php echo $_ENV["url"]; ?>assets/js/darkModeOthers.js"></script>
<script src="<?php echo $_ENV["url"]; ?>assets/js/login.js"></script>
<script src="<?php echo $_ENV["url"]; ?>assets/js/messagesMenu.js"></script>
<script src="<?php echo $_ENV["url"]; ?>assets/js/burger.js"></script>
<script src="<?php echo $_ENV["url"]; ?>assets/js/picturesMenu.js"></script>
<script src="<?php echo $_ENV["url"]; ?>assets/js/config.js"></script>
<script src="<?php echo $_ENV["url"]; ?>assets/js/app.js"></script>
</body>
</html>