<!DOCTYPE html>
<html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>SimpleImageBoard</title>
        <link rel="icon" type="image/x-icon" href="assets/images/img.ico">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.5/dist/bootstrap-table.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.5/dist/bootstrap-table.min.js"></script>
        <link href="assets/css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
</head>
<body class="webseite-bg">

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
        <script type="text/javascript" src="/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
        <script type="text/javascript" src="/fancybox/jquery.easing-1.4.pack.js"></script>
        <script type="text/javascript" src="/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>

        <!-- file-upload mit PHP -->
        <!-- https://www.w3schools.com/php/php_file_upload.asp -->

        <!-- + Button, für Hochladen -->
        <section class=" portfolio" id="spiele">
                <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal1" align="center">
                        <label class="topMenu" >[+] Bild hochladen</label>
                </div>

                <div align='center' class="ueberschrift">
                        <a href="index.php"><h1>SimpleImageBoard <img src='assets/images/img.png' height='75'/> </h1></a>
                </div>

        </section>

        <!-- Das sich öffnende Fenster, zum Hochladen -->
        <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" aria-labelledby="portfolioModal1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content hochladenfenster">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" ></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title  text-uppercase mb-0">Bild hochladen</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                    </div>
                                        <form action="upload.php" method="post" enctype="multipart/form-data">
                                                Bild auswählen:
                                                <input type="file" name="fileToUpload" id="fileToUpload" accept="image/gif,image/jpeg,image/png">
                                                <br><br>
                                                <input type="submit" value="Hochladen" name="submit" class="btn btn-primary">
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
<!-- http://fancybox.net/ -->
<!-- http://fancybox.net/howto -->
<!-- -->

        <div align="center-left" class="bilderliste">
                <div class="main_view container" align="center" id="main_view">
                        <div class="container">
                                <div class="row">
                                        <div class="col-sm">
                                                <a href="" class="bigView" id="goLeft" onclick="goLeft()">[<<]</a>
                                        </div>
                                        <div class="col-sm">
                                                <a href="" class="bigView" id="linkBigView" target="_blank">[+]</a> 
                                        </div>
                                        <div class="col-sm">
                                                <a href="" class="bigView" id="goRight" onclick="goRight()">[>>]</a>
                                        </div>
                                </div>
                                <!-- <div class="container"> -->
                                <div class="row">
                                        
                                       
                                        <div class="col-bg">
                                                <img src="" id="mainIMG" class="bigView" onclick="closeME()">
                                        </div>
                                        
                                </div>
                                 <!-- </div> -->
                        <!-- <img src="" id="mainIMG" class="bigView col" onclick="closeME()"> <a href="" class="bigView col" id="linkBigView" target="_blank" onclick="goLeft()">[<<]</a> <a href="" class="bigView col" id="linkBigView" target="_blank">[+]</a> <a href="" class="bigView col" id="linkBigView" target="_blank" onclick="goRight()">[>>]</a> -->
                        </div>
                        
                </div>

                <div class="side_view">
                <?php

                        // Der Punkt steht für das Verzeichnis, in der auch dieses
                        // PHP-Programm gespeichert ist
                        $verzeichnis = 'uploads/';

                // Test, ob es sich um ein Verzeichnis handelt
                if (is_dir($verzeichnis)) {
                    // öffnen des Verzeichnisses
                    if ($handle = opendir($verzeichnis)) {
                        // einlesen der Verzeichnisses
                        while (($file = readdir($handle)) !== false) {
                            if ($file == '.' || $file == '..' || $file == 'tmp') {
                            } else {
                                echo "<img src='uploads/";
                                echo $file;
                                echo "' class='einzelBilder' onclick='change(this.src)'/>";
                            }
                        }
                        closedir($handle);
                    }
                }
                ?>
                </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="assets/js/scripts.js"></script>
        <script>
               
                const change = src => {
                        document.getElementById('linkBigView').href = src;
                        document.getElementById('mainIMG').src = src;
                        document.getElementById('mainIMG').style.display = "block";
                        document.getElementById('linkBigView').style.display = "block";
                        document.getElementById('goRight').style.display = "block";
                        document.getElementById('goLeft').style.display = "block";
                        /* Dies Code sorgt dafür, dass das Bild nicht den ganzen Bildschirm einnimt, sondern maximal die Bildschirmhöhe */
                        document.getElementById('mainIMG').style.height = "100%";
                        document.getElementById('mainIMG').style.width = "100vh";
                        document.getElementById('mainIMG').style.objectFit = "cover";
                }

                function closeME()
                {
                        document.getElementById('mainIMG').style.display = "none";
                        document.getElementById('linkBigView').style.display = "none";
                        document.getElementById('goRight').style.display = "none";
                        document.getElementById('goLeft').style.display = "none";
                }

                function goLeft()
                {
                        //document.getElementById('linkBigView').href = src;
                }

                function goRight()
                {
                        //document.getElementById('linkBigView').href = src;
                }

        </script>

</body>
</html>

