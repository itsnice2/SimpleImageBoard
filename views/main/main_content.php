<content>

<div class="gallery-container">

<?php $myImages = getImageList($dir_images); ?>

<?php foreach($myImages AS $img):?>
    <a class="gallery-item" href="<?php echo $dir_images . $img; ?>">
        <img src="<?php echo $dir_thumbnails . $img; ?>" class="image-grid">
    </a>
<?php endforeach; ?>

</div>

</content>