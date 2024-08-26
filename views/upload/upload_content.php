<h3><?php echo $upload_title; ?></h3>
<p><?php echo $upload_allowed_files; ?></p>

<form action="/upload.php" method="POST" enctype="multipart/form-data">
    <label for="file-upload" class="custom-file-upload">
        <?php echo $upload_choose_image; ?>
    </label>
    <input type="file" name="src" id="file-upload"/><br><br>
    <label for="upload" class="upload-button">
    <?php echo $upload_upload_text; ?>
    </label>
    <input type="submit" value="Hochladen" id="upload-button"/>
</form>


