<!DOCTYPE html>
<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>SimpleImageBoard</title>
        <link rel="icon" type="image/x-icon" href="assets/images/img.ico">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.5/dist/bootstrap-table.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.5/dist/bootstrap-table.min.js"></script>
</head>
<body style="background-color: #202020; color:white;">

        <!-- file-upload mit PHP -->
        <!-- https://www.w3schools.com/php/php_file_upload.asp -->

        <div align="center">
                <!-- https://www.w3schools.com/php/php_file_upload.asp -->
                <form action="upload.php" method="post" enctype="multipart/form-data">
                        Bild auswählen:
                        <input type="file" name="fileToUpload" id="fileToUpload" accept="image/gif,image/jpeg,image/png">
                        <input type="submit" value="Hochladen" name="submit">
                </form>
        </div>


        <div align='center' style='padding-top: 10px; font-family: Tahoma;'>
                <h1>SimpleImageBoard <img src='assets/images/img.png' height='25'/> </h1>
        </div>


        <div align="center-left" style="background-color: black;">

        <?php

        // Der Punkt steht für das Verzeichnis, in der auch dieses
        // PHP-Programm gespeichert ist
        $verzeichnis = "uploads/";

        // Test, ob es sich um ein Verzeichnis handelt
        if ( is_dir ( $verzeichnis ))
        {
            // öffnen des Verzeichnisses
            if ( $handle = opendir($verzeichnis) )
            {
                // einlesen der Verzeichnisses
                while (($file = readdir($handle)) !== false)
                {
                        if($file == "." || $file == ".." || $file == "tmp")
                        {}
                        else
                        {
                                echo "<img src='uploads/";
                                echo $file;
                                echo "' style='height: 150px; width: 150px; margin: 2px; object-fit: cover;'/>";
                        }
                }
                closedir($handle);
            }
        }
        ?>
        </div>

</body>
</html>

