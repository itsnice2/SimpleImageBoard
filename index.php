<?php require_once 'inc/de.php'; ?>

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

<?php 
    //phpinfo();
    require_once 'inc/functions.php';

    require_once 'views/main/main_header.php';
    require_once 'views/main/main_content.php';
    require_once 'views/main/main_footer.php';

?>


</body>
</html>