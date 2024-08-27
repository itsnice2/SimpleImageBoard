<?php 
  setcookie('uploadstatus', 'YetToUploadSomething', 360);
  $_COOKIE['uploadstatus'] = 'YetToUploadSomething';
?>
<?php 
    require_once 'inc/config.php';
    require_once 'inc/' . $language . '.php';
    require_once 'inc/functions.php'; 
?>

<!DOCTYPE html>
<html lang="<?php echo $language; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/images/img.ico">
    <title><?php echo $tabtitle; ?></title>
    <link href="assets/css/simpleimageboard.css" rel="stylesheet" />
</head>
<body>

<?php require_once 'views/main/main_header.php'; ?>

<?php
	if(!empty($_FILES['src']) &&
		$_FILES['src']['error'] === UPLOAD_ERR_OK &&
		$_FILES['src']['type'] === 'image/jpeg'){

		$uploadedImage = $_FILES['src']['tmp_name'];
		if(!is_uploaded_file($uploadedImage)) die();

		$filename = preg_replace('/[^A-Za-z0-9\-]/', '', date("Ymd-His-") . microtime());
		
		$fileEnding = '.jpg';

		$pathToThumbnail = $dir_thumbnails . $filename . $fileEnding;
		$pathToImage = $dir_images . $filename . $fileEnding;

		// Erst Bild hochladen
		$uploadOK = uploadImage($uploadedImage, $pathToImage);

		// Dann Thumbnail erstellen
		$resizeOK = uploadThumbnail($pathToImage, $pathToThumbnail, 200);
		
		if($uploadOK){
			if($resizeOK){
				//@chmod($pathToThumbnail, 0777);
				$_COOKIE['uploadstatus'] = 'good';
			}
			else{
				$_COOKIE['uploadstatus'] = 'bad';
			}
		}
		else{
			$_COOKIE['uploadstatus'] = 'bad';
		}		

	}
?>

<content>

    <?php if($_COOKIE['uploadstatus'] === 'good'): ?>
        <?php require 'views/upload/upload_successful.php'; ?>
    <?php elseif($_COOKIE['uploadstatus'] === 'bad'): ?>
        <?php require 'views/upload/upload_failed.php'; ?>
    <?php else: ?>

		<?php //require 'views/upload/upload_content.php'; ?>
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
			<input type="submit" value="Hochladen" id="upload"/>
		</form>

    <?php endif; ?>

</content>

<?php require_once 'views/main/main_footer.php'; ?>

</body>
</html>