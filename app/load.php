<?php
chdir(__DIR__);
require(realpath('../vendor/autoload.php'));

use thiagoalessio\TesseractOCR\TesseractOCR;

if (isset($_POST['submit'])) {
    //$check = getimagesize($_FILES["myfile"]["tmp_name"]);

    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        //$uploadOk = 1;
        $ocr = (new TesseractOCR($_FILES["myfile"]["tmp_name"]))->run();
    } else {
        $error = 'Fichier trop lourd OU ce n\'est pas une image';
        //echo "File is not an image.";
        //$uploadOk = 0;
    }
}